<?php

// \	Dùng để biểu diễn ký tự đặc biệt [ ] ( ) { } . * + ? ^ $ \ |

/**
 * Check email validate
 * structure of email validation: <username>@<domain>.<ext>
 * - username: 
 *  + nomarl char, -, _, ., number
 *  + start with normal characters
 *  + length: >=3
 * - domain: nomarl char, -, _, ., number
 *  + start with normal characters
 *  + length: >=1
 * - ext: 
 *  + nomarl char
 *  + length: >=2
 */

$email = "hoangan.web@gmail.com";

$pattern = '/^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$/';

$check = preg_match($pattern, $email);
if ($check == true) {
    var_dump("Validate email digit " . $email . " is valid => success");
    die();
} else {
    var_dump("Validate email digit " . $email . " is not match");
    die();
}
