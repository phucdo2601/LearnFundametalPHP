<?php

/**
 * Lookaround được chia làm 2 loại đó là lookahead và lookbehind. Nó dùng để kiểm tra điều kiện ở phía trước 
 * hoặc phía sau pattern đứng trước hoặc sau nó. Lookahead được sử dụng khi chúng ta có điều kiện pattern này 
 * được đi trước pattern khác. Ví dụ, bạn muốn lấy tất cả các số trước đó là ký tự $
 */

$content = 'unicode academy academy unicode';
/**
 * Positive lookahead: /academy(?=\sacademy)/ => kiem tra cac ky tu phia sau no la academy
 */
$pattern = '/academy(?=\sacademy)/';
$check = preg_match($pattern, $content, $matches);

/**
 * Negative lookahead: '/academy(?!\sacademy)/ => kiem tra cac khong co ky tu academy phia sau no
 */
$pattern = '/academy(?!\sacademy)/';
$check = preg_match($pattern, $content, $matches);
echo '<pre>';

/**
 * Positive behind: /(?<=unicode\s)academy/ => kiem tra cac ky tu phia truoc no la unicode
 */
$pattern = '/(?<=unicode\s)academy/';
$check = preg_match($pattern, $content, $matches);

/**
 * Negative behind: /(?<!unicode\s)academy/ =>kiem tra cac khong co ky tu unicode phia truoc no
 */
$pattern = '/(?<!unicode\s)academy/';
$check = preg_match($pattern, $content, $matches);
echo '<pre>';

print_r($matches);
echo '</pre>';
