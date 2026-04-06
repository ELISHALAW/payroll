<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $basic_salary = $request->input('basic_salary', 0);
        $allowance = $request->input('allowance', 0);

        $data = $this->calculatePayroll($basic_salary, $allowance);
        return view('user.general.payroll', array_merge($data, [
            'user' => $user,
            'basic_salary' => $basic_salary,
            'allowance' => $allowance
        ]));
    }

    public function calculatePayroll($basic_salary, $allowance)
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


        return [
            'epf' => number_format($epf, 2),
            'socso' => number_format($socso, 2),
            'eis' => number_format($eis, 2),
            'net_pay' => number_format($net_pay, 0),
            'total_deduction' => number_format($total_deduction, 2),
            'epf_employer' => number_format($epf_employer, 2),
            'socso_employer' => number_format($socso_employer, 2),
            'eis_employer' => number_format($eis_employer, 2),
            'total_cost_deduction' => number_format($total_cost_deduction, 2)
        ];
    }
}
