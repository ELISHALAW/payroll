<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 15px;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .container {
            border: 1px solid #000;
            padding: 20px;
            min-height: 980px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            vertical-align: top;
        }

        /* Header */
        .company-name {
            font-size: 18px;
            font-weight: bold;
        }

        .payslip-title {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            line-height: 1.2;
        }

        /* Employee Info Box */
        .info-box {
            border: 1px solid #000;
            border-radius: 12px;
            margin: 15px 0;
            padding: 10px;
        }

        .info-box td {
            padding: 3px 5px;
            font-size: 10px;
        }

        .label {
            font-weight: normal;
            width: 90px;
        }

        .value {
            font-weight: bold;
        }

        /* Main Grid (Earnings/Deductions/Leave) */
        .main-grid {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
        }

        .col-border {
            border-right: 2px solid #000;
        }

        .section-title {
            font-weight: bold;
            text-decoration: underline;
            padding: 8px 5px;
        }

        .data-row td {
            padding: 4px 5px;
        }

        .total-row td {
            border-top: 1px solid #000;
            padding: 10px 5px;
            font-weight: bold;
        }

        /* Leave Table Fix - Use fixed widths to prevent overlapping */
        .leave-header td {
            font-size: 9px;
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding: 5px 2px;
            text-align: center;
        }

        .leave-data td {
            font-size: 10px;
            padding: 6px 2px;
            text-align: center;
        }

        .leave-type-name {
            text-align: left !important;
            width: 90px;
        }

        /* Summary Stats Table */
        .stat-table th,
        .stat-table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: right;
            font-size: 9px;
        }

        .stat-table th {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        /* Footer */
        .net-pay-container {
            border: 2px solid #000;
            padding: 12px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            width: 250px;
            margin: 0 auto;
        }

        .sig-line {
            border-bottom: 1px solid #000;
            height: 35px;
            width: 100%;
        }

        .footer-note {
            font-size: 9px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    @php
        // Ensure numeric values to prevent calculation errors
        $gross = (float) ($basic_salary ?? 0) + (float) ($allowance ?? 0);
        $total_deduct =
            (float) ($monthly_ee_epf ?? 0) +
            (float) ($monthly_ee_socso ?? 0) +
            (float) ($monthly_ee_eis ?? 0) +
            (float) ($monthly_ee_pcb ?? 0);

        use Carbon\Carbon;
    @endphp

    <div class="container">
        <table>
            <tr>
                <td width="70">
                    <div
                        style="width: 60px; height: 60px; border: 1px solid #000; text-align: center; line-height: 60px;">
                        LOGO</div>
                </td>
                <td>
                    <div class="company-name">SMS GURU SDN BHD</div>
                    <div style="font-size: 10px;">(202101001051 (1401349-T))</div>
                </td>
                <td class="payslip-title">
                    Payslip For<br> {{ $selected_month }}
                </td>
            </tr>
        </table>

        <div class="info-box">
            <table>
                <tr>
                    <td class="label">NAME :</td>
                    <td class="value" width="220">{{ $name ?? 'Employee Name' }}</td>
                    <td class="label">SOCSO :</td>
                    <td class="value">{{ $user->getDetail('socso_no') ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">DEPT :</td>
                    <td class="value">{{ $user->getDetail('department') ?? '-' }}</td>
                    <td class="label">EMPLOYEE NO :</td>
                    <td class="value">{{ $user->getDetail('employee_no') ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">BANK A/C NO :</td>
                    <td class="value">{{ $user->getDetail('bank_account_no') ?? '-' }}</td>
                    <td class="label">EPF :</td>
                    <td class="value">{{ $user->getDetail('epf_no') ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td class="value"></td>
                    <td class="label">TAX :</td>
                    <td class="value">{{ $user->getDetail('income_tax_no') ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <table class="main-grid">
            <tr>
                <td class="col-border" width="30%">
                    <table>
                        <tr>
                            <td class="section-title">Earnings</td>
                            <td class="section-title" align="right">RM</td>
                        </tr>
                        <tr class="data-row">
                            <td>Basic Salary</td>
                            <td align="right">{{ number_format($basic_salary ?? 0, 2) }}</td>
                        </tr>
                        @if ($allowance > 0)
                            <tr class="data-row">
                                <td>Allowance</td>
                                <td align="right">{{ number_format($allowance, 2) }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2" style="height: 50px;"></td>
                        </tr>
                        <tr class="total-row">
                            <td>Total Earning</td>
                            <td align="right">{{ number_format($gross, 2) }}</td>
                        </tr>
                    </table>
                </td>

                <td class="col-border" width="30%">
                    <table>
                        <tr>
                            <td class="section-title">Deductions</td>
                            <td class="section-title" align="right">RM</td>
                        </tr>
                        <tr class="data-row">
                            <td>EPF Employee</td>
                            <td align="right">-{{ number_format($monthly_ee_epf ?? 0, 2) }}</td>
                        </tr>
                        <tr class="data-row">
                            <td>SOCSO Employee</td>
                            <td align="right">-{{ number_format($monthly_ee_socso ?? 0, 2) }}</td>
                        </tr>
                        <tr class="data-row">
                            <td>EIS Employee</td>
                            <td align="right">-{{ number_format($monthly_ee_eis ?? 0, 2) }}</td>
                        </tr>
                        <tr class="data-row">
                            <td>PCB</td>
                            <td align="right">-{{ number_format($monthly_ee_pcb ?? 0, 2) }}</td>
                        </tr>
                        <tr class="total-row">
                            <td>Total Deduction</td>
                            <td align="right">-{{ number_format($total_deduct, 2) }}</td>
                        </tr>
                    </table>
                </td>

                <td width="40%" style="padding-left: 10px;">
                    <table>
                        <tr class="leave-header">
                            <td class="leave-type-name">LEAVE TYPE</td>
                            <td>B/F</td>
                            <td>ENT</td>
                            <td>YTD</td>
                            <td>MTD</td>
                            <td>BAL</td>
                        </tr>
                        <tr class="leave-data">
                            <td class="leave-type-name">Annual Leave</td>
                            <td>0.00</td>
                            <td>{{ $annual_ent ?? 0 }}</td>
                            <td>0.00</td>
                            <td>{{ $days_taken }}</td>
                            <td class="value">0.00</td>
                        </tr>
                        <tr class="leave-data">
                            <td class="leave-type-name">Medical Leave</td>
                            <td>0.00</td>
                            <td>{{ $medical_ent ?? 0 }}</td>
                            <td>0.00</td>
                            <td>{{ $sick_days_taken }}</td>
                            <td class="value">0.00</td>
                        </tr>
                        <tr class="leave-data">
                            <td class="leave-type-name">Hospital leave </td>
                            <td>0.00</td>
                            <td>{{ $hospital_ent ?? 0 }}</td>
                            <td>0.00</td>
                            <td>{{ $hospitalization_days_taken }}</td>
                            <td class="value">0.00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table class="stat-table" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th align="left" width="80">Type</th>
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
                    <td align="left">Current Mth</td>
                    <td>{{ number_format($monthly_ee_pcb ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_ee_epf ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_er_epf ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_ee_socso ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_er_socso ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_ee_eis ?? 0, 2) }}</td>
                    <td>{{ number_format($monthly_er_eis ?? 0, 2) }}</td>
                </tr>
                <tr>
                    <td align="left">YTD</td>
                    <td>{{ number_format($ytd_pcb ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_ee_epf ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_er_epf ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_ee_socso ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_er_socso ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_ee_eis ?? 0, 2) }}</td>
                    <td>{{ number_format($ytd_er_eis ?? 0, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 40px;">
            <tr>
                <td width="33%">
                    <div class="footer-note">
                        ee : Employee | er : Employer<br><br>
                        <strong>Notes:</strong><br>This is a computer-generated payslip.
                    </div>
                </td>
                <td width="34%" align="center">
                    <div class="net-pay-container">
                        Net Pay: RM {{ number_format($net_pay ?? 0, 2) }}
                    </div>
                </td>
                <td width="33%">
                    <table style="width: 200px; float: right;">
                        <tr>
                            <td class="value">APPROVED BY :</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="sig-line"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="value" style="padding-top: 15px;">RECEIVED BY :</td>
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
