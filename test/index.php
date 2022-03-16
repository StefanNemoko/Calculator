<?php
$d=0;
$y=date('Y');
    for($m=1;$m<=12;$m++){
        $d+=cal_days_in_month(CAL_GREGORIAN,$m,$y);
    }
echo "There was $d days in $m $y";
echo " " . date('L');
?>