<?php
function calcPCB($gross, $epf, $socso, $eis, $marital, $kids, $life_ds = 0) {
    // 2023 rates
    $grossAnnual = $gross * 12;
    $epfAnnual = min(4000, $epf * 12);
    $socsoAnnual = min(350, ($socso + $eis) * 12); // testing combined
    
    $relief = 9000;
    if ($marital == 'married') $relief += 4000;
    $relief += $kids * 2000;
    
    $chargeable = $grossAnnual - $epfAnnual - $socsoAnnual - $relief - $life_ds;
    if ($chargeable < 0) $chargeable = 0;
    
    $tax = 0;
    if ($chargeable <= 5000) $tax = 0;
    elseif ($chargeable <= 20000) $tax = ($chargeable - 5000) * 0.01;
    elseif ($chargeable <= 35000) $tax = 150 + (($chargeable - 20000) * 0.03);
    elseif ($chargeable <= 50000) $tax = 600 + (($chargeable - 35000) * 0.06);
    elseif ($chargeable <= 70000) $tax = 1500 + (($chargeable - 50000) * 0.11);
    elseif ($chargeable <= 100000) $tax = 3700 + (($chargeable - 70000) * 0.19);
    
    if ($chargeable < 35000) $tax -= 400; // rebate
    if ($tax < 0) $tax = 0;
    
    return $tax / 12;
}

echo "Testing to find 74.57\n";
for($i = 0; $i <= 5000; $i+=50) {
    $r = calcPCB(5000, 550, 25, 10, 'single', 0, $i);
    if(abs($r - 74.57) < 1) {
        echo "Found with extra relief $i : $r\n";
    }
}
