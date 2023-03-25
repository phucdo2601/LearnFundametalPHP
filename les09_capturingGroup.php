<?php

$subject = '<img height="200" title="Anh" src="https://unicode.vn/images/anh.jpg" alt=""
title="" width="" />';

$pattern  = '<img(\s+[a-z-]+\s*=\s*"[^"]*")*\ssrc="([^"]+)"(\s+[a-z-]+\s*=\s*"[^"]*")*\s*/*>';
$check = preg_match($pattern, $subject, $matches);

// var_dump($check);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';

if (!empty($matches[2])) {
    echo 'Link image: ' . $matches[2];
} else {
    echo 'Dont have a phone number';
}
