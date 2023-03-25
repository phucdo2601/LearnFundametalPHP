<?php

// 1. Regex phủ định – NOT: Trong regex, ta dùng ký tự ^ để phủ định một Regex nào đó.
// $subject = '123456';

// $pattern = '/[^0-9]+/';
// $check = preg_match($pattern, $subject);
// if ($check == true) {
//     var_dump("Validate subject digit " . $subject . " is valid => success");
//     die();
// } else {
//     var_dump("Validate subject digit " . $subject . " is not match");
//     die();
// }

echo '<hr/>';

// $subject = 'lap trinh tai unicode. PHP la ngon ngu lap trinh backend';

/**
 * Truong hop hoac trong regex
 */
// $pattern = '/php|backend/';

// $check = preg_match($pattern, $subject);
// if ($check == true) {
//     var_dump("Validate subject digit " . $subject . " is valid => success");
//     die();
// } else {
//     var_dump("Validate subject digit " . $subject . " is not match");
//     die();
// }

/**
 * Kep hop voi cac bieu thuc khac, dua them ()
 */
$subject = 'php012345';

$pattern = '/(php|backend)\d+/';

$check = preg_match($pattern, $subject, $matches);
if ($check == true) {
    var_dump("Validate subject digit " . $subject . " is valid => success");
    // die();
} else {
    var_dump("Validate subject digit " . $subject . " is not match");
    // die();
}

echo '<pre>';
print_r($matches);
echo '</pre>';
