<?php

namespace App\Services;

class PayrollService
{
    public function calculate($basic, $allowance)
    {
        $calculation_base = $basic + $allowance;

        $rates = config('payrollRates');

        $epfRate = $rates['epf'] ?? 0.11;

        $epfEmployerLowRate = $rates['epf_employer_low'] ?? 0.13;
        $epfEmployerHighRate = $rates['epf_employer_high'] ?? 0.12;

        $statutoryBase = min($calculation_base, $rates['ceiling'] ?? 6000.00);

        $socsoRate = $rates['socso'] ?? 0.005;
        $socsoEmployerRate = $rates['socso_employer'] ?? 0.0175;

        $eisRate = $rates['eis'] ?? 0.002;
        $eisEmployerRate = $rates['eis_employer'] ?? 0.002;


        $epf = ceil($calculation_base * $epfRate);
        $epfEmployer = ceil($basic <= 5000) ? $epfEmployerLowRate * $basic : $epfEmployerHighRate * $basic;

        $socso = $statutoryBase * $socsoRate;
        $socsoEmployer = $statutoryBase * $socsoEmployerRate;

        $eis = $statutoryBase * $eisRate;
        $eisEmployer = $statutoryBase * $eisEmployerRate;

        $pcb = $this->calculatePCB($calculation_base, $epf, $socso, $eis);

        $total_deduction = $epf + $socso + $eis + $pcb;
        $net_pay = $calculation_base - $total_deduction;

        return [
            'epf' => $epf,
            'epf_employer' => $epfEmployer,

            'socso' => $socso,
            'socso_employer' => $socsoEmployer,

            'eis' => $eis,
            'eis_employer' => $eisEmployer,

            'pcb' => $pcb,
            'net_pay' => $net_pay
        ];
    }


    public function calculatePCB($gross, $epf, $socso, $eis)
    {
        $monthly_personal_relief = 750.00;

        $monthly_epf_deduction = min($epf, 333.33);

        // Combine SOCSO and EIS to apply the MYR 350 combined annual limit (approx 29.17 monthly)
        $monthly_socso_eis_deduction = $socso + $eis;

        $chargeable_income = $gross - $monthly_personal_relief - $monthly_epf_deduction - $monthly_socso_eis_deduction;

        $annual_chargeable = $chargeable_income * 12;

        if ($annual_chargeable <= 5000) {
            return 0;
        }

        $tax_amount = $this->calculateAnnualTax($annual_chargeable);

        // Apply MYR 400 Rebate if chargeable income is 35,000 and below
        if ($annual_chargeable <= 35000) {
            $tax_amount = $tax_amount - 400;
        }

        $tax_amount = max(0, $tax_amount);

        return (float)($tax_amount / 12);
    }


    public function calculateAnnualTax($annual_tax)
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
        } elseif ($annual_tax <= 600000) {
            // 400,001 - 600,000 档位 (官方税率 26%, 底税 84,400)
            $tax_amount = ($annual_tax - 400000) * 0.26 + 84400;
        } elseif ($annual_tax <= 2000000) {
            // 600,001 - 2,000,000 档位 (官方税率 28%, 底税 136,400)
            $tax_amount = ($annual_tax - 600000) * 0.28 + 136400;
        } else {
            // 超过 2,000,000 的部分 (官方税率 30%, 底税 528,400)
            $tax_amount = ($annual_tax - 2000000) * 0.30 + 528400;
        }

        return $tax_amount;
    }
}
