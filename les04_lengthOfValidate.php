<?php

$subject = '123hoangan@gmail.com';
/**
 * Min - Max
 */
// $pattern = '/[a-z]{3,5}/';
/**
 * >= Min
 */
// $pattern = '/[a-z]{5,}/';

/**
 * Excatly length
 */
// $pattern = '/[a-z]{5}/';

/**
 * 0 -Max
 */
$pattern = '/[a-z]{0,5}/';


$check = preg_match($pattern, $subject);
if ($check == true) {
    var_dump("Validate string digit " . $subject . " is valid => success");
    die();
} else {
    var_dump("Validate string digit " . $subject . " is not match");
    die();
}
