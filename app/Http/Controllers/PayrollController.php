<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\PayrollService;

class PayrollController extends Controller
{
    protected $payrollService;

    public function __construct(PayrollService $payrollService)
    {
        $this->payrollService = $payrollService;
    }


    public function showAnnualEnt($joinDate)
    {
        if (!$joinDate) {
            return 0.00; // No join date, no entitlement
        }

        $joinCarbon = Carbon::parse($joinDate);
        $now = Carbon::now();

        // Calculate years of service
        $yearsOfService = $joinCarbon->diffInYears($now);

        // Malaysian Employment Act Statutory Minimums:
        if ($yearsOfService < 2) {
            return 8.00;
        } elseif ($yearsOfService < 5) {
            return 12.00;
        } else {
            return 16.00;
        }
    }

    public function showMedicalEnt($joinDate)
    {
        if (!$joinDate) {
            return 0.00; // No join date, no entitlement
        }

        $joinDateCarbon = Carbon::parse($joinDate);

        $yearOfService = $joinDateCarbon->diffInYears(Carbon::now());

        if ($yearOfService < 2) {
            return 14.00;
        } elseif ($yearOfService < 5) {
            return 18.00;
        } else {
            return 22.00;
        }
    }

    public function showHospitalEnt($joinDate)
    {
        if (!$joinDate) {
            return 0.00; // No join date, no entitlement
        }

        return 60.00;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $selected_month = (int) $request->input('selected_month', date('n'));
        $selected_year = (int) $request->input('selected_year', date('Y'));




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
        $ytd_ee = ['epf' => 0, 'socso' => 0, 'eis' => 0, 'pcb' => 0];
        $ytd_er = ['epf' => 0, 'socso' => 0, 'eis' => 0];

        // Sum up historically saved data for all months prior to the selected month
        for ($m = $startMonth; $m < $selected_month; $m++) {
            $ytd_ee['epf']   += (float)($allSavedData["month_{$m}_epf_employee"] ?? 0);
            $ytd_ee['socso'] += (float)($allSavedData["month_{$m}_socso_employee"] ?? 0);
            $ytd_ee['eis']   += (float)($allSavedData["month_{$m}_eis_employee"] ?? 0);
            $ytd_ee['pcb']   += (float)($allSavedData["month_{$m}_pcb_employee"] ?? 0);

            $ytd_er['epf']   += (float)($allSavedData["month_{$m}_epf_employer"] ?? 0);
            $ytd_er['socso'] += (float)($allSavedData["month_{$m}_socso_employer"] ?? 0);
            $ytd_er['eis']   += (float)($allSavedData["month_{$m}_eis_employer"] ?? 0);
        }

        // 5. Current Month Calculation
        $calc = $this->payrollService->calculate($basic, $allowance);

        // Add the current selected month's calculation to the YTD
        $ytd_ee['epf']   += $calc['epf'];
        $ytd_ee['socso'] += $calc['socso'];
        $ytd_ee['eis']   += $calc['eis'];
        $ytd_ee['pcb']   += $calc['pcb'];

        $ytd_er['epf']   += $calc['epf_employer'];
        $ytd_er['socso'] += $calc['socso_employer'];
        $ytd_er['eis']   += $calc['eis_employer'];

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
            'ytd_ee_pcb'   => $ytd_ee['pcb'],

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
        $payrollData = $this->payrollService->calculate($basic, $allowance);

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
        $selected_year = (int) $request->input('selected_year', date('Y'));
        $user = Auth::user();

        $annual_ent = $this->showAnnualEnt($user->getDetail('join_date'));
        $medical_ent = $this->showMedicalEnt($user->getDetail('join_date'));


        // We cast everything to float to ensure number_format() works in the PDF
        $data = [
            'user'           => $user,
            'name'           => $request->input('user_name', 'Employee'),
            'selected_month' => Carbon::create()->month($monthNumber)->format('F'),
            'selected_year'  => $selected_year,

            'annual_ent' => $annual_ent,
            'medical_ent' => $medical_ent,
            'hospital_ent' => number_format($this->showHospitalEnt($user->getDetail('join_date'))),

            // --- 1. INCOME DATA ---
            'basic_salary'   => (float) str_replace(',', '', $request->input('basic_salary', 0)),
            'allowance'      => (float) str_replace(',', '', $request->input('allowance', 0)),

            // --- 2. MONTHLY EMPLOYEE (EE) DEDUCTIONS ---
            'monthly_ee_epf'   => (float) str_replace(',', '', $request->input('epf_amount', 0)),
            'monthly_ee_socso' => (float) str_replace(',', '', $request->input('socso_amount', 0)),
            'monthly_ee_eis'   => (float) str_replace(',', '', $request->input('eis_amount', 0)),
            'monthly_ee_pcb'   => (float) str_replace(',', '', $request->input('pcb_amount', 0)),

            // --- 3. MONTHLY EMPLOYER (ER) CONTRIBUTIONS ---
            'monthly_er_epf'   => (float) str_replace(',', '', $request->input('epf_employer', 0)),
            'monthly_er_socso' => (float) str_replace(',', '', $request->input('socso_employer', 0)),
            'monthly_er_eis'   => (float) str_replace(',', '', $request->input('eis_employer', 0)),

            'ytd_pcb'            => (float) str_replace(',', '', $request->input('ytd_ee_pcb', 0)),

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
            'hospitalization_days_taken' => $user->getDetail('hospitalization_days') ?? '0',
        ];

        $pdf = Pdf::loadView('user.general.pdf_template', $data);

        return $pdf->download('payslip_' . $data['name'] . '.pdf');
    }
}
