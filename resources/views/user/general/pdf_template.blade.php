<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #0891b2; padding-bottom: 10px; }
        .section-title { background: #f3f4f6; padding: 5px; font-weight: bold; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 8px; border-bottom: 1px solid #eee; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }
        .total-row { font-size: 16px; color: #0891b2; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PAY ADVICE</h2>
        <p>{{ $month }}</p>
    </div>

    <p><strong>Employee Name:</strong> {{ $name }}</p>

    <div class="section-title">EARNINGS</div>
    <table>
        <tr>
            <td>Basic Salary</td>
            <td class="text-right">RM {{ number_format($basic_salary, 2) }}</td>
        </tr>
        <tr>
            <td>Allowances</td>
            <td class="text-right">RM {{ number_format($allowance, 2) }}</td>
        </tr>
    </table>

    <div class="section-title">DEDUCTIONS</div>
    <table>
        <tr>
            <td>EPF (Employee)</td>
            <td class="text-right">RM {{ number_format($epf, 2) }}</td>
        </tr>
        <tr>
            <td>SOCSO</td>
            <td class="text-right">RM {{ number_format($socso, 2) }}</td>
        </tr>
        <tr>
            <td>EIS</td>
            <td class="text-right">RM {{ number_format($eis, 2) }}</td>
        </tr>
    </table>

    <table>
        <tr class="total-row">
            <td>NET PAYABLE</td>
            <td class="text-right">RM {{ number_format($net_pay, 2) }}</td>
        </tr>
    </table>
</body>
</html>