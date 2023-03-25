<?php

/**
 * 2
 * Check URL validation
 * Structure: protocol + www + domain + port
 */
$url = 'https://www.unicode.vn:8080/khoa-hoc/lap-trinh-php-nang-cao';
// $url = 'https://unicode.vn';

$pattern = '~^(http|https)://[a-z][a-z-_\.]*\.[a-z]{2,}(:\d+)?(/?|/[a-z-_0-9\./]*)$~';

$check = preg_match($pattern, $url);
if ($check == true) {
    var_dump("Validate url digit " . $url . " is valid => success");
    // die();
} else {
    var_dump("Validate url digit " . $url . " is not match");
    // die();
}
