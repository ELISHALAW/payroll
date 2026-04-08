<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 18px 18px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .page {
            border: 1px solid #000;
            padding: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .t-right {
            text-align: right;
        }

        .t-left {
            text-align: left;
        }

        .t-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .small {
            font-size: 9px;
        }

        .company-title {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .payslip-for {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.15;
        }

        .emp-box {
            border: 1px solid #000;
            border-radius: 14px;
            padding: 10px 12px;
            margin-top: 10px;
        }

        .emp-box td {
            vertical-align: top;
            padding: 2px 6px;
            line-height: 1.2;
        }

        .label {
            width: 105px;
            white-space: nowrap;
        }

        .main-grid {
            margin-top: 12px;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
        }

        .main-grid td {
            vertical-align: top;
        }

        .col {
            border-right: 2px solid #000;
        }

        .col:last-child {
            border-right: 0;
        }

        .col-inner {
            width: 100%;
        }

        .col-head td {
            border-bottom: 1px solid #000;
            padding: 6px 8px;
            font-weight: bold;
        }

        .col-body td {
            padding: 7px 8px;
        }

        .row-item td {
            padding: 3px 0;
        }

        .subtotal td {
            border-top: 1px solid #000;
            padding: 7px 8px;
            font-weight: bold;
        }

        .leave-head td {
            padding: 0;
        }

        .leave-table {
            table-layout: fixed;
        }

        .leave-table td {
            padding: 2px 4px;
            white-space: nowrap;
        }

        .leave-table .lt-name {
            text-align: left;
            width: 38%;
        }

        .leave-table .lt-val {
            text-align: right;
            width: 12.4%;
        }

        .leave-table .lt-head {
            text-align: center;
            padding-left: 6px;
            padding-right: 6px;
        }

        .stat {
            margin-top: 16px;
        }

        .stat th,
        .stat td {
            border: 1px solid #000;
            padding: 6px 6px;
            text-align: right;
            font-size: 10px;
        }

        .stat th {
            font-weight: bold;
            background: #fff;
        }

        .footer {
            margin-top: 18px;
        }

        .net-pay {
            border: 2px solid #000;
            padding: 9px 12px;
            width: 240px;
            font-size: 16px;
            font-weight: bold;
        }

        .sig td {
            padding: 3px 0;
        }

        .sig-line {
            border-bottom: 1px solid #000;
            height: 26px;
        }
    </style>
</head>

<body>
    @php
        $companyName = 'SMS GURU SDN BHD';
        $companyReg = '(202101001051 (1401349-T))';

        $grossPay = (float) ($basic_salary ?? 0) + (float) ($allowance ?? 0);
        $employeeName = (string) ($name ?? 'Employee');
        $payslipMonth = (string) ($selected_month ?? '');

        $current_epf_employee = $user->getDetail("month_{$selected_month}_epf_employee");
        $current_socso_employee = $user->getDetail("month_{$selected_month}_socso_employee");
        $current_eis_employee = $user->getDetail("month_{$selected_month}_eis_employee");
    @endphp

    <div class="page">
        <table>
            <tr>
                <td style="width: 64px; vertical-align: top;">
                    <div
                        style="width: 54px; height: 54px; border: 1px solid #000; text-align: center; line-height: 54px; font-weight: bold; font-size: 11px;">
                        LOGO
                    </div>
                </td>
                <td style="vertical-align: top;">
                    <div class="company-title">{{ $companyName }}
                        <span style="font-size: 10px; font-weight: normal;">{{ $companyReg }}</span>
                    </div>
                </td>
                <td class="t-right" style="width: 200px; vertical-align: top;">
                    <div class="payslip-for">Payslip For<br>{{ strtoupper($payslipMonth) }}</div>
                </td>
            </tr>
        </table>

        <div class="emp-box">
            <table>
                <tr>
                    <td style="width: 52%;">
                        <table>
                            <tr>
                                <td class="label">NAME :</td>
                                <td class="bold">{{ $employeeName }}</td>
                            </tr>
                            <tr>
                                <td class="label">DEPT : {{ $user->getdetail('department') }}</td>
                                <td>----</td>
                            </tr>
                            <tr>
                                <td class="label">BANK A/C NO :</td>
                                <td>{{ $user->getDetail('bank_account_no') }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 48%;">
                        <table>
                            <tr>
                                <td class="label">SOCSO :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="label">EMPLOYEE NO :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="label">EPF :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="label">TAX :</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <table class="main-grid">
            <tr>
                <td class="col" style="width: 32%;">
                    <table class="col-inner">
                        <tr class="col-head">
                            <td class="t-left"><span style="text-decoration: underline;">Earnings</span></td>
                            <td class="t-right">RM</td>
                        </tr>
                        <tr class="col-body">
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr class="row-item">
                                        <td class="t-left">Basic Salary</td>
                                        <td class="t-right">{{ number_format((float) $basic_salary, 2) }}</td>
                                    </tr>
                                    @if (((float) $allowance) > 0)
                                        <tr class="row-item">
                                            <td class="t-left">Allowance</td>
                                            <td class="t-right">{{ number_format((float) $allowance, 2) }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                        <tr class="subtotal">
                            <td class="t-left">Total Earning</td>
                            <td class="t-right">{{ number_format($grossPay, 2) }}</td>
                        </tr>
                    </table>
                </td>

                <td class="col" style="width: 32%;">
                    <table class="col-inner">
                        <tr class="col-head">
                            <td class="t-left"><span style="text-decoration: underline;">Deductions</span></td>
                            <td class="t-right">RM</td>
                        </tr>
                        <tr class="col-body">
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr class="row-item">
                                        <td class="t-left">EPF Employee</td>
                                        <td class="t-right">-{{ number_format((float) $epf, 2) }}</td>
                                    </tr>
                                    <tr class="row-item">
                                        <td class="t-left">SOCSO Employee</td>
                                        <td class="t-right">-{{ number_format((float) $socso, 2) }}</td>
                                    </tr>
                                    <tr class="row-item">
                                        <td class="t-left">EIS Employee</td>
                                        <td class="t-right">-{{ number_format((float) $eis, 2) }}</td>
                                    </tr>
                                    <tr class="row-item">
                                        <td class="t-left">Income Tax PCB</td>
                                        <td class="t-right">-{{ number_format(0, 2) }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @php
                            $totalDeduction = (float) $epf + (float) $socso + (float) $eis;
                        @endphp
                        <tr class="subtotal">
                            <td class="t-left">Total Deduction</td>
                            <td class="t-right">-{{ number_format($totalDeduction, 2) }}</td>
                        </tr>
                    </table>
                </td>

                <td style="width: 36%;">
                    <table class="col-inner">
                        <tr class="col-head leave-head">
                            <td colspan="2" style="padding: 6px 8px;">
                                <table class="leave-table" style="width: 100%;">
                                    <tr>
                                        <td class="lt-name" style="text-decoration: underline; font-weight: bold;">Leave
                                            Type</td>
                                        <td class="lt-val lt-head bold">B/F</td>
                                        <td class="lt-val lt-head bold">Entitle</td>
                                        <td class="lt-val lt-head bold">YTD</td>
                                        <td class="lt-val lt-head bold">MTD</td>
                                        <td class="lt-val lt-head bold">Bal.</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="col-body">
                            <td colspan="2" style="height: 190px;">
                                <table class="leave-table" style="width: 100%;">
                                    <tr>
                                        <td class="lt-name">Annual Leave</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="lt-name">Medical Leave</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                        <td class="lt-val">0.00</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="subtotal">
                            <td class="t-left">&nbsp;</td>
                            <td class="t-right">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table class="stat">
            <thead>
                <tr>
                    <th class="t-left" style="text-align: left; width: 100px;"></th>
                    <th>PCB</th>
                    <th>EPF ee</th>
                    <th>EPF er</th>
                    <th>SOCSO ee</th>
                    <th>SOCSO er</th>
                    <th>EIS ee</th>
                    <th>EIS er</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="t-left" style="text-align: left;">Mid. Paid</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="t-left" style="text-align: left;">Current Mth</td>
                    <td></td>
                    <td>{{ number_format($epf_employer_monthly, 2) }}</td>
                    <td>{{ number_format($epf, 2) }}</td>
                    <td>{{ number_format($socso_employer_monthly, 2) }}</td>
                    <td>{{ number_format($socso, 2) }}</td>
                    <td>{{ number_format($eis_employer_monthly, 2) }}</td>
                    <td>{{ number_format($eis, 2) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="t-left" style="text-align: left;">YTD</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <table class="footer">
            <tr>
                <td style="width: 33%; vertical-align: bottom;">
                    <div class="small">ee : Employee<br>er : Employer<br><br>Notes:</div>
                </td>
                <td style="width: 34%; vertical-align: bottom;" class="t-center">
                    <div style="display: inline-block;" class="net-pay">
                        <table style="width: 100%;">
                            <tr>
                                <td class="t-left">Net Pay</td>
                                <td class="t-right">RM {{ number_format((float) str_replace(',', '', $net_pay), 0) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width: 33%; vertical-align: bottom;">
                    <table class="sig" style="width: 100%;">
                        <tr>
                            <td class="t-left bold">APPROVED BY :</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="sig-line"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="t-left bold">RECEIVED BY :</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="sig-line"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
