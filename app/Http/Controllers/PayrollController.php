<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $selected_month = (int) $request->input('selected_month', date('n'));
        $selected_year = (int) date('Y');

        // 1. Fetch ALL data (including join_date)
        $allSavedData = UserDetail::where('user_id', $user->id)->pluck('value', 'name');

        // 2. Determine Start Month based on Join Date
        $joinDateRaw = $allSavedData['join_date'] ?? null;
        $startMonth = 1; // Default
        if ($joinDateRaw) {
            $carbonJoin = Carbon::parse($joinDateRaw);
            // Start from join month only if they joined in the current year
            $startMonth = ($carbonJoin->year == $selected_year) ? $carbonJoin->month : 1;
        }

        // 3. Current Month Logic (Fetching Basic & Allowance)
        if ($request->input('action') === 'fetch' || $request->isMethod('GET')) {
            $basic = (float) str_replace(',', '', $allSavedData["month_{$selected_month}_basic"] ?? 0);
            $allowance = (float) str_replace(',', '', $allSavedData["month_{$selected_month}_allowance"] ?? 0);
        } else {
            $basic = (float) $request->input('basic_salary', 0);
            $allowance = (float) $request->input('allowance', 0);
        }

        // 4. SEPARATED CUMULATIVE CALCULATION
        // Grouping into Employee (ee) and Employer (er)
        $ytd_ee = ['epf' => 0, 'socso' => 0, 'eis' => 0];
        $ytd_er = ['epf' => 0, 'socso' => 0, 'eis' => 0];

        for ($m = $startMonth; $m <= $selected_month; $m++) {
            $ytd_ee['epf']   += (float)($allSavedData["month_{$m}_epf_employee"] ?? 0);
            $ytd_ee['socso'] += (float)($allSavedData["month_{$m}_socso_employee"] ?? 0);
            $ytd_ee['eis']   += (float)($allSavedData["month_{$m}_eis_employee"] ?? 0);

            $ytd_er['epf']   += (float)($allSavedData["month_{$m}_epf_employer"] ?? 0);
            $ytd_er['socso'] += (float)($allSavedData["month_{$m}_socso_employer"] ?? 0);
            $ytd_er['eis']   += (float)($allSavedData["month_{$m}_eis_employer"] ?? 0);
        }

        // 5. Current Month Calculation
        $calc = $this->calculatePayroll($basic, $allowance);

        // 6. Return Data with specific naming conventions
        return view('user.general.payroll', [
            'user' => $user,
            'selected_month' => $selected_month,

            'basic_salary' => $basic,
            'allowance'    => $allowance,
            // --- GROUP 1: MONTHLY (EE & ER) ---
            'monthly_ee_epf'   => $calc['epf'],
            'monthly_ee_socso' => $calc['socso'],
            'monthly_ee_eis'   => $calc['eis'],
            'monthly_ee_pcb'   => $calc['pcb'],

            'monthly_er_epf'   => $calc['epf_employer'],
            'monthly_er_socso' => $calc['socso_employer'],
            'monthly_er_eis'   => $calc['eis_employer'],
            'net_pay'          => $calc['net_pay'],

            // --- GROUP 2: CUMULATIVE (YTD - EE) ---
            'ytd_ee_epf'   => $ytd_ee['epf'],
            'ytd_ee_socso' => $ytd_ee['socso'],
            'ytd_ee_eis'   => $ytd_ee['eis'],

            // --- GROUP 3: CUMULATIVE (YTD - ER) ---
            'ytd_er_epf'   => $ytd_er['epf'],
            'ytd_er_socso' => $ytd_er['socso'],
            'ytd_er_eis'   => $ytd_er['eis'],

            // --- GROUP 4: OVERALL (Combined Total) ---
            'total_epf'   => $ytd_ee['epf']   + $ytd_er['epf'],
            'total_socso' => $ytd_ee['socso'] + $ytd_er['socso'],
            'total_eis'   => $ytd_ee['eis']   + $ytd_er['eis'],
        ]);
    }

    private function calculatePayroll($basic, $allowance)
    {
        // 1. Determine the Gross amount used for statutory calculations
        $calculation_base = $basic + $allowance;
        $rates = config('payrollRates');

        // Safety fallback rates if config is missing
        $epfRate = $rates['epf'] ?? 0.11;
        $epfErLowRate = $rates['epf_employer_low'] ?? 0.13;
        $epfErHighRate = $rates['epf_employer_high'] ?? 0.12;
        $socsoRate = $rates['socso'] ?? 0.005;
        $socsoErRate = $rates['socso_employer'] ?? 0.0175;
        $eisRate = $rates['eis'] ?? 0.002;
        $eisErRate = $rates['eis_employer'] ?? 0.002;
        $ceilingLimit = $rates['ceiling'] ?? 6000.00;

        // 2. Calculate EPF
        // Malaysian Rule: EPF contributions mathematically must be rounded UP to the nearest Ringgit (no cents).
        $epf = ceil($calculation_base * $epfRate);

        $epfErRateActual = ($calculation_base <= 5000) ? $epfErLowRate : $epfErHighRate;
        $epf_employer = ceil($calculation_base * $epfErRateActual);

        // 3. Calculate SOCSO & EIS
        // Malaysian Rule: SOCSO and EIS are capped at the ceiling limit (currently RM 6,000)
        $socsoEisBase = min($calculation_base, $ceilingLimit);

        // Note: For absolute legal compliance down to the cent, SOCSO & EIS use bracket tables ("Jadual").
        // This programmatic calculation is a close mathematical approximation for system convenience.
        $socso = round($socsoEisBase * $socsoRate, 2);
        $socso_employer = round($socsoEisBase * $socsoErRate, 2);

        $eis = round($socsoEisBase * $eisRate, 2);
        $eis_employer = round($socsoEisBase * $eisErRate, 2);

        $pcb = $this->calculatePCB($calculation_base, $epf, $socso, $eis);
        // 4. Totals
        // Note: PCB (Income Tax) is excluded here as it requires complex LHDN formulas based on tax relief.
        $total_deduction = $epf + $socso + $eis + $pcb;
        $total_employer_contribution = $epf_employer + $socso_employer + $eis_employer;

        // 5. Net Pay (Actual Basic + Allowance - Employee Deductions)
        $net_pay = $calculation_base - $total_deduction;

        return [
            // Employee Portions (Monthly)

            'epf'             => $epf,
            'socso'           => $socso,
            'eis'             => $eis,
            'pcb'             => $pcb,
            'total_deduction' => $total_deduction,

            // Employer Portions (Monthly)
            'epf_employer'    => $epf_employer,
            'socso_employer'  => $socso_employer,
            'eis_employer'    => $eis_employer,
            'total_employer'  => $total_employer_contribution,

            // Final Totals
            'net_pay'         => round($net_pay, 2),
            'gross_pay'       => $calculation_base,
            'basic_salary'    => $basic,
            'allowance'       => $allowance
        ];
    }

    private function calculatePCB($gross, $epf_deduction, $socso_deduction, $eis_deduction)
    {
        $monthly_personal_relief = 750.00;
        $monthly_epf_deduction = min($epf_deduction, 333.333);
        $monthly_socso_deduction = min($socso_deduction, 29.17);
        $monthly_eis_deduction = min($eis_deduction, 29.17);

        $income_Tax = $gross - $monthly_personal_relief - $monthly_epf_deduction - $monthly_socso_deduction - $monthly_eis_deduction;

        if ($income_Tax <= 0) {
            return 0;
        }

        $annual_tax = $income_Tax * 12;

        $tax_amount = $this->calculateTaxAmount($annual_tax);

        if ($annual_tax <= 35000) {
            $tax_amount = max(0, $tax_amount - 400);
        }

        return round($tax_amount / 12, 2);
    }

    private function calculateTaxAmount($annual_tax)
    {
        $tax_amount = 0;

        if ($annual_tax <= 5000) {
            $tax_amount = 0;
        } elseif ($annual_tax <= 20000) {
            // 5,001 - 20,000 档位
            $tax_amount = ($annual_tax - 5000) * 0.01;
        } elseif ($annual_tax <= 35000) {
            // 20,001 - 35,000 档位 (底税 150)
            $tax_amount = ($annual_tax - 20000) * 0.03 + 150;
        } elseif ($annual_tax <= 50000) {
            // 35,001 - 50,000 档位 (官方税率 6%, 底税 600)
            $tax_amount = ($annual_tax - 35000) * 0.06 + 600;
        } elseif ($annual_tax <= 70000) {
            // 50,001 - 70,000 档位 (官方税率 11%, 底税 1500)
            $tax_amount = ($annual_tax - 50000) * 0.11 + 1500;
        } elseif ($annual_tax <= 100000) {
            // 70,001 - 100,000 档位 (官方税率 19%, 底税 3700)
            $tax_amount = ($annual_tax - 70000) * 0.19 + 3700;
        } elseif ($annual_tax <= 400000) {
            // 100,001 - 400,000 档位 (官方税率 25%, 底税 9400)
            $tax_amount = ($annual_tax - 100000) * 0.25 + 9400;
        } else {
            // 超过 400,000 的部分
            $tax_amount = ($annual_tax - 400000) * 0.28 + 84400;
        }

        return $tax_amount;
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // 1. IMPROVED VALIDATION
        $validated = $request->validate([
            'selected_month' => 'required|integer|between:1,12',
            'basic_salary'   => 'required|numeric|min:0|max:100000',
            'allowance'      => 'nullable|numeric|min:0|max:50000',
        ], [
            'selected_month.between' => 'Please select a valid month (Jan-Dec).',
            'basic_salary.min'       => 'Basic salary cannot be a negative value.',
        ]);

        $month = $validated['selected_month'];
        $basic = (float)$validated['basic_salary'];
        $allowance = (float)($validated['allowance'] ?? 0);

        // 2. Re-calculate based on validated data
        $payrollData = $this->calculatePayroll($basic, $allowance);

        // 3. Prepare Data (mapped to your UserDetail 'name' keys)
        $dataToSave = [
            "month_{$month}_basic"          => (string)$basic,
            "month_{$month}_allowance"      => (string)$allowance,
            "month_{$month}_pcb_employee" => (string)$payrollData['pcb'],
            "month_{$month}_net_pay"        => (string)$payrollData['net_pay'],
            "month_{$month}_epf_employee"   => (string)$payrollData['epf'],
            "month_{$month}_socso_employee" => (string)$payrollData['socso'],
            "month_{$month}_eis_employee"   => (string)$payrollData['eis'],
            "month_{$month}_epf_employer"   => (string)$payrollData['epf_employer'],
            "month_{$month}_socso_employer" => (string)$payrollData['socso_employer'],
            "month_{$month}_eis_employer"   => (string)$payrollData['eis_employer'],
        ];

        // 4. Database Transaction (Recommended for multiple updates)
        DB::transaction(function () use ($user, $dataToSave) {
            foreach ($dataToSave as $key => $value) {
                UserDetail::updateOrCreate(
                    ['user_id' => $user->id, 'name' => $key],
                    [
                        'value' => $value,
                        'remark' => 'Payroll Update ' . now()->toDateTimeString()
                    ]
                );
            }
        });

        return redirect()->back()->with('success', 'Payroll for ' . date("F", mktime(0, 0, 0, $month, 1)) . ' saved successfully!');
    }

    public function downloadPayslip(Request $request)
    {
        $monthNumber = (int) $request->input('selected_month', date('n'));
        $user = Auth::user();
        // We cast everything to float to ensure number_format() works in the PDF
        $data = [
            'user'           => $user,
            'name'           => $request->input('user_name', 'Employee'),
            'selected_month' => Carbon::create()->month($monthNumber)->format('F Y'),

            // --- 1. INCOME DATA ---
            'basic_salary'   => (float) str_replace(',', '', $request->input('basic_salary', 0)),
            'allowance'      => (float) str_replace(',', '', $request->input('allowance', 0)),

            // --- 2. MONTHLY EMPLOYEE (EE) DEDUCTIONS ---
            'monthly_ee_epf'   => (float) str_replace(',', '', $request->input('epf_amount', 0)),
            'monthly_ee_socso' => (float) str_replace(',', '', $request->input('socso_amount', 0)),
            'monthly_ee_eis'   => (float) str_replace(',', '', $request->input('eis_amount', 0)),

            // --- 3. MONTHLY EMPLOYER (ER) CONTRIBUTIONS ---
            'monthly_er_epf'   => (float) str_replace(',', '', $request->input('epf_employer', 0)),
            'monthly_er_socso' => (float) str_replace(',', '', $request->input('socso_employer', 0)),
            'monthly_er_eis'   => (float) str_replace(',', '', $request->input('eis_employer', 0)),

            // --- 4. CUMULATIVE EMPLOYEE (EE) YTD ---
            'ytd_ee_epf'       => (float) str_replace(',', '', $request->input('ytd_ee_epf', 0)),
            'ytd_ee_socso'     => (float) str_replace(',', '', $request->input('ytd_ee_socso', 0)),
            'ytd_ee_eis'       => (float) str_replace(',', '', $request->input('ytd_ee_eis', 0)),

            // --- 5. CUMULATIVE EMPLOYER (ER) YTD ---
            'ytd_er_epf'       => (float) str_replace(',', '', $request->input('ytd_er_epf', 0)),
            'ytd_er_socso'     => (float) str_replace(',', '', $request->input('ytd_er_socso', 0)),
            'ytd_er_eis'       => (float) str_replace(',', '', $request->input('ytd_er_eis', 0)),

            // --- 6. OVERALL TOTALS (EE + ER COMBINED) ---
            'overall_epf'      => (float) str_replace(',', '', $request->input('total_epf', 0)),
            'overall_socso'    => (float) str_replace(',', '', $request->input('total_socso', 0)),
            'overall_eis'      => (float) str_replace(',', '', $request->input('total_eis', 0)),

            'net_pay'          => (float) str_replace(',', '', $request->input('net_pay_amount', 0)),

            'days_taken' => $user->getDetail('days_taken') ?? '0',
            'sick_days_taken' => $user->getDetail('sick_days_taken') ?? '0',
            'hospitalization_days_taken' => $user->getDetail('hospitalization_days_taken') ?? '0',
        ];

        $pdf = Pdf::loadView('user.general.pdf_template', $data);

        return $pdf->download('payslip_' . $data['name'] . '.pdf');
    }
}
