<?php

/**
 * Check Html tag
 */

$htmlTags = '<a href="https://unicode.vn">Unicode</a>';
// $htmlTags = '<input type="text" class="field-input" />';
// $url = 'https://unicode.vn';

// $pattern = '~^<[a-z]+(\s+[a-z-]+\s*=\s*"[^"]+")*>.+</[a-z]>$~';
$pattern = '~^<[a-z]+(\s+[a-z-]+\s*=\s*"[^"]+")*(>.+</[a-z]+>$|\s*/>)$~';

$check = preg_match($pattern, $htmlTags);
if ($check == true) {
    var_dump("Validate htmlTags digit " . $htmlTags . " is valid => success");
    // die();
} else {
    var_dump("Validate htmlTags digit " . $htmlTags . " is not match");
    // die();
}
