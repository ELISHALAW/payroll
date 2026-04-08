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

        // 1. Fetch ALL saved data for this user to avoid multiple queries
        $allSavedData = UserDetail::where('user_id', $user->id)
            ->where('name', 'like', 'month_%')
            ->pluck('value', 'name');

        // 2. Logic for Individual Monthly Inputs (Current Month Only)
        if ($request->input('action') === 'fetch' || $request->isMethod('GET')) {
            $basic_salary = (float) str_replace(',', '', $allSavedData["month_{$selected_month}_basic"] ?? 0);
            $allowance = (float) str_replace(',', '', $allSavedData["month_{$selected_month}_allowance"] ?? 0);
        } else {
            $basic_salary = (float) $request->input('basic_salary', 0);
            $allowance = (float) $request->input('allowance', 0);
        }

        // 3. CUMULATIVE CALCULATION (The "Increase" Logic)
        // We loop from month 1 (Jan) up to the selected month
        $cumulative_epf_employer = 0;
        $cumulative_socso_employer = 0;
        $cumulative_eis_employer = 0;



        for ($m = 1; $m <= $selected_month; $m++) {
            $cumulative_epf_employer += (float) str_replace(',', '', $allSavedData["month_{$m}_epf_employer"] ?? 0);
            $cumulative_socso_employer += (float) str_replace(',', '', $allSavedData["month_{$m}_socso_employer"] ?? 0);
            $cumulative_eis_employer += (float) str_replace(',', '', $allSavedData["month_{$m}_eis_employer"] ?? 0);
        }

        // 4. Run your standard payroll math for the CURRENT month
        $calc = $this->calculatePayroll($basic_salary, $allowance);

        return view('user.general.payroll', [
            'user' => $user,
            'selected_month' => $selected_month,
            'basic_salary' => $basic_salary,
            'allowance' => $allowance,

            // THE "++" VALUES (Sum of Jan until Selected Month)
            'epf_employer_cumulative' => $cumulative_epf_employer,
            'socso_employer_cumulative' => $cumulative_socso_employer,
            'eis_employer_cumulative' => $cumulative_eis_employer,

            // THE MONTHLY VALUES (Results from $calc)
            'epf' => $calc['epf'],
            'socso' => $calc['socso'],
            'eis' => $calc['eis'],
            'net_pay' => $calc['net_pay'],
            'epf_employer_monthly' => $calc['epf_employer'],
            'socso_employer_monthly' => $calc['socso_employer'],
            'eis_employer_monthly' => $calc['eis_employer'],


        ]);
    }

    private function calculatePayroll($basic_salary, $allowance)
    {
        $basic_salary = $basic_salary + $allowance;
        $rates = config('payrollRates');
        $epf = $basic_salary * $rates['epf'];
        $socso = $basic_salary * $rates['socso'];
        $eis = $basic_salary * $rates['eis'];



        $epf_employer = ($basic_salary <= 5000) ? ($basic_salary * $rates['epf_employer_low']) : ($basic_salary * $rates['epf_employer_high']);
        $socso_employer = $basic_salary * $rates['socso_employer'];
        $eis_employer = $basic_salary * $rates['eis_employer'];

        $total_cost_deduction = $epf_employer + $socso_employer + $eis_employer;

        $total_deduction = $epf + $socso + $eis;

        $net_pay = $basic_salary - ($epf + $socso + $eis);
        $net_pay = round($net_pay, 2);

        return [
            'epf' => $epf,
            'socso' => $socso,
            'eis' => $eis,
            'net_pay' => $net_pay,
            'total_deduction' => $total_deduction,
            'epf_employer' => $epf_employer,
            'socso_employer' => $socso_employer,
            'eis_employer' => $eis_employer,
            'total_cost_deduction' => $total_cost_deduction,
            // Pass these back so the view knows what was used
            'basic_salary' => $basic_salary,
            'allowance' => $allowance
        ];
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

        $user = UserDetail::where('user_id', Auth::id())->first();


        $data = [
            'user' => Auth::user(),
            'name'          => $request->input('user_name', 'Employee'),
            'selected_month'         => Carbon::create()->month($monthNumber)->format('F Y'),

            // Clean commas from strings and cast to float to satisfy number_format()
            'basic_salary'  => (float) str_replace(',', '', $request->input('basic_salary', 0)),
            'allowance'     => (float) str_replace(',', '', $request->input('allowance', 0)),
            'epf'           => (float) str_replace(',', '', $request->input('epf_amount', 0)),
            'socso'         => (float) str_replace(',', '', $request->input('socso_amount', 0)),
            'eis'           => (float) str_replace(',', '', $request->input('eis_amount', 0)),

            'epf_employer_monthly'   => (float) str_replace(',', '', $request->input('epf_employer', 0)),
            'socso_employer_monthly' => (float) str_replace(',', '', $request->input('socso_employer', 0)),
            'eis_employer_monthly'   => (float) str_replace(',', '', $request->input('eis_employer', 0)),

            // Final Totals
            'net_pay'        => (float) str_replace(',', '', $request->input('net_pay_amount', 0)),


        ];

        // Use the full path we confirmed in the last step
        $pdf = Pdf::loadView('user.general.pdf_template', $data);

        return $pdf->download('payslip_' . $data['name'] . '.pdf');
    }
}
