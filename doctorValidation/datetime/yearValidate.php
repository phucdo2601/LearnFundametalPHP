<?php

$params = array();
$year = 2021;
$params['year'] = $year;
$isError = false;
if ($params['year'] > date("Y") || $params['year'] < 1950) {
    $errmsg['month'] = "Nam " . $params['year'] . " .Nam hop le tu 1950 den " . date("Y") . ".Chon lai!";
    $isError = true;
}
if ($isError == false) {
    # code...
    echo $year . ' is validate year.';
} else {
    foreach ($errmsg as $value) {
        echo $value;
    }
}
