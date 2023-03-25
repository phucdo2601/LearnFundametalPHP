<?php

$subject = '<img title="Anh 1" height="300" src="https://unicode.vn/images/anh.jpg" alt="Anh 1" width="" style="width: 300px;"/>';

/**
 * Dau ? dat sau cham thi la co hoac khong
 * Dau ? dat do dai (+, *) la ngat
 */
$pattern  = '<img(?:\s+[a-z-]+\s*=\s*"[^"]*")*\ssrc="([^"]+)"(?:\s+[a-z-]+\s*=\s*"[^"]*")*\s*/*>';
$check = preg_match($pattern, $subject, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';
