<?php

$phone = 'XE1987215040';

$pattern = '/^XE1[0-9]{9}$/';

$check = preg_match($pattern, $phone);

if ($check == true) {
    var_dump("Validate string digit " . $phone . " is valid => success");
    die();
} else {
    var_dump("Validate string digit " . $phone . " is not match");
    die();
}
