<?php

$params = array();

$year = 2004;
$month = 2;
$day = 29;

$params['year'] = $year;
$params['month'] = $month;
$params['day'] = $day;
$isError = false;

if ($params['month'] > 12 || $params['month'] < 1) {
    $errmsg['month'] = "Thang cua moi nam tu 1 den 12.Chon lai!";
    $isError = true;
}
if ($params['year'] % 400 == 0 || ($params['year'] % 4 == 0 && $params['year'] % 100 != 0)) {
    if ($params['month'] == 2) {
        if ($params['day'] > 29) {
            $errmsg['day'] = "Thang 2 cua nam " . $year . " co 29. Chon lai";
            $isError = true;
        }
    }
} else {
    if ($params['month'] == 2) {
        if ($params['day'] > 28) {
            $errmsg['day'] = "Thang 2 cua nam " . $year . " co 28. Chon lai";
            $isError = true;
        }
    }
}

if ($params['month'] == 4 || $params['month'] == 6 || $params['month'] == 9 || $params['month'] == 11) {
    if ($params['day'] > 30) {
        $errmsg['day'] = "Cac Thang 4,6,9,11 cua nam nam co 30. Chon lai";
        $isError = true;
    }
}

if ($params['month'] == 1 || $params['month'] == 3 || $params['month'] == 6 || $params['month'] == 9 || $params['month'] == 11) {
    if ($params['day'] > 31) {
        $errmsg['day'] = "Thang 1,3,5,7,8,10,12 cua nam nam co 31. Chon lai";
        $isError = true;
    }
}

if ($isError == false) {
    # code...
    $birthday = $params['year'] . '-' . $params['month'] . '-' . $params['day'] . ' is validate date.';
    echo $birthday;
} else {
    foreach ($errmsg as $value) {
        echo $value;
    }
}
