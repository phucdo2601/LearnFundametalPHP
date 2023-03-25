<?php

/**
 * Check password validation:
 * -Starts with alphabet
 * Length larger than 6
 */
$password = 'abc123';

// $pattern = '/^[a-z][0-9]$/';

$pattern1 = '/^[a-z]/';
$pattern2 = '/[0-9]$/';

if (strlen($password) >= 6 && preg_match($pattern1, $password) && preg_match($pattern2, $password)) {
    # code...
    var_dump('PASSWORD: ' . $password . ' is validate with this format');
} else {
    var_dump('PASSWORD: ' . $password . ' is not validate with this format');
}
