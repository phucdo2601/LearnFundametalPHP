<?php

/**
 * 1
 * Check Vietnamese Phone Number validate
 * 0 or +84
 * lenghth: 10
 * su dung dau ngoac tron de phan cach code cho doc de hieu 
 * []: kiem tra tung ki tu dat trong cap ngoac vuong
 * can them chuoi escape \ de check dau cong
 */
$phone = "0987215804";

$pattern = '/^(0|\+84)\d{9}$/';
$check = preg_match($pattern, $phone);
if ($check == true) {
    var_dump("Validate phone digit " . $phone . " is valid => success");
    // die();
} else {
    var_dump("Validate phone digit " . $phone . " is not match");
    // die();
}
