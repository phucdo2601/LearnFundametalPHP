<?php

$params = array();
$month = -1;
$params['month'] = $month;
$isError = false;
if ($params['month'] > 12 || $params['month'] < 1) {
    $errmsg['month'] = "Thang cua moi nam tu 1 den 12.Chon lai!";
    $isError = true;
}
if ($isError == false) {
    # code...
    echo $month . ' is validate month.';
} else {
    foreach ($errmsg as $value) {
        echo $value;
    }
}
