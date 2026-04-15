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
        $payrollData = UserDetail::where('user_id', $user->id)->whereYear('created_at', $selected_year)->pluck('value', 'name');

        // 2. Determine Start Month based on Join Date
        $joinDateRaw = UserDetail::where('user_id', $user->id)->where('name', 'join_date')->value('value');
        $isFetch = $request->input('action') === 'fetch' || $request->isMethod('GET');
        $basic = $isFetch ? $this->clean($payrollData["month_{$selected_month}_basic"] ?? 0) : $this->clean($request->input('basic_salary', 0));
        $allowance = $isFetch ? $this->clean($payrollData["month_{$selected_month}_allowance"] ?? 0) : $this->clean($request->input('allowance', 0));

        $calc = $this->payrollService->calculate($basic, $allowance);
        $ytd = $this->payrollService->calculateYTD($payrollData, $selected_month, $selected_year, $joinDateRaw, $calc);

        return view('user.general.payroll', array_merge([
            'user' => $user,
            'selected_month' => $selected_month,
            'selected_year' => $selected_year,
            'basic_salary' => $basic,
            'allowance' => $allowance,
            'payrollData' => $payrollData,

            'monthly_ee_epf'   => $calc['epf'],
            'monthly_ee_socso' => $calc['socso'],
            'monthly_ee_eis'   => $calc['eis'],
            'monthly_ee_pcb'   => $calc['pcb'],

            // Map Monthly (ER)
            'monthly_er_epf'   => $calc['epf_employer'],
            'monthly_er_socso' => $calc['socso_employer'],
            'monthly_er_eis'   => $calc['eis_employer'],
            'net_pay'          => $calc['net_pay'],
        ], $calc, $ytd));
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
        $hospital_ent = $this->showHospitalEnt($user->getDetail('join_date'));

        $allSavedData = UserDetail::where('user_id', $user->id)->pluck('value', 'name')->toArray();

        $basic = $this->clean($request->input('basic_salary', $allSavedData["month_{$monthNumber}_basic"] ?? 0));
        $allowance = $this->clean($request->input('allowance', $allSavedData["month_{$monthNumber}_allowance"] ?? 0));

        $calc = $this->payrollService->calculate($basic, $allowance);

        $startMonth = 1;
        $joinDateRaw = $allSavedData['join_date'] ?? null;
        if ($joinDateRaw) {
            $carbonJoin = Carbon::parse($joinDateRaw);
            $startMonth = ($carbonJoin->year === $selected_year) ? $carbonJoin->month : 1;
        }

        $ytd_ee = ['epf' => 0, 'socso' => 0, 'eis' => 0, 'pcb' => 0];
        $ytd_er = ['epf' => 0, 'socso' => 0, 'eis' => 0];

        for ($m = $startMonth; $m < $monthNumber; $m++) {
            $ytd_ee['epf']   += (float) ($allSavedData["month_{$m}_epf_employee"] ?? 0);
            $ytd_ee['socso'] += (float) ($allSavedData["month_{$m}_socso_employee"] ?? 0);
            $ytd_ee['eis']   += (float) ($allSavedData["month_{$m}_eis_employee"] ?? 0);
            $ytd_ee['pcb']   += (float) ($allSavedData["month_{$m}_pcb_employee"] ?? 0);

            $ytd_er['epf']   += (float) ($allSavedData["month_{$m}_epf_employer"] ?? 0);
            $ytd_er['socso'] += (float) ($allSavedData["month_{$m}_socso_employer"] ?? 0);
            $ytd_er['eis']   += (float) ($allSavedData["month_{$m}_eis_employer"] ?? 0);
        }

        $ytd_ee['epf']   += $calc['epf'];
        $ytd_ee['socso'] += $calc['socso'];
        $ytd_ee['eis']   += $calc['eis'];
        $ytd_ee['pcb']   += $calc['pcb'];

        $ytd_er['epf']   += $calc['epf_employer'];
        $ytd_er['socso'] += $calc['socso_employer'];
        $ytd_er['eis']   += $calc['eis_employer'];

        $data = [
            'user'           => $user,
            'name'           => $request->input('user_name', $user->name),
            'selected_month' => Carbon::create()->month($monthNumber)->format('F'),
            'selected_year'  => $selected_year,

            'annual_ent' => $annual_ent,
            'medical_ent' => $medical_ent,
            'hospital_ent' => $hospital_ent,

            // --- 1. INCOME DATA ---
            'basic_salary' => $basic,
            'allowance'    => $allowance,

            // --- 2. MONTHLY EMPLOYEE (EE) DEDUCTIONS ---
            'monthly_ee_epf'   => $calc['epf'],
            'monthly_ee_socso' => $calc['socso'],
            'monthly_ee_eis'   => $calc['eis'],
            'monthly_ee_pcb'   => $calc['pcb'],

            // --- 3. MONTHLY EMPLOYER (ER) CONTRIBUTIONS ---
            'monthly_er_epf'   => $calc['epf_employer'],
            'monthly_er_socso' => $calc['socso_employer'],
            'monthly_er_eis'   => $calc['eis_employer'],

            'ytd_pcb'          => $ytd_ee['pcb'],
            'ytd_ee_epf'       => $ytd_ee['epf'],
            'ytd_ee_socso'     => $ytd_ee['socso'],
            'ytd_ee_eis'       => $ytd_ee['eis'],
            'ytd_er_epf'       => $ytd_er['epf'],
            'ytd_er_socso'     => $ytd_er['socso'],
            'ytd_er_eis'       => $ytd_er['eis'],

            'overall_epf'      => $ytd_ee['epf'] + $ytd_er['epf'],
            'overall_socso'    => $ytd_ee['socso'] + $ytd_er['socso'],
            'overall_eis'      => $ytd_ee['eis'] + $ytd_er['eis'],

            'net_pay'        => $calc['net_pay'],

            'days_taken'                 => $user->getDetail('days_taken') ?? '0',
            'sick_days_taken'            => $user->getDetail('sick_days_taken') ?? '0',
            'hospitalization_days_taken' => $user->getDetail('hospitalization_days') ?? '0',
        ];

        $pdf = Pdf::loadView('user.general.pdf_template', $data);

        return $pdf->download('payslip_' . str_replace(' ', '_', $data['name']) . '.pdf');
    }

    private function clean($value)
    {
        return (float) str_replace(',', '', $value ?? 0);
    }
}
