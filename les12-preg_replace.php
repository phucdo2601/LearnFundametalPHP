<?php

$subject = 'https://unicode.vn/khoa-hoc/page/1';

$pattern = '~\d+$~';

$result = preg_replace($pattern, 'page', $subject);
echo $result;

echo '<hr/>';

$content = 'Lorem Ipsum is simply dummy 0987215806 text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s 
standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type 
specimen book. 0987215804 It has survived not only five centuries, but also 0987215801 the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

$pattern = '~0\d{9}~';
$replace = '<a href="https://www.google.com.vn/"><b>Search Googgle</b></a>';
/**
 * Luu y:
 * Ham nay se tra ve chuoi sau khi da thay the 
 * Ham nay chi thay the tat ca ket qua tim kiem dc. Neu muon gioi han thi phai them vao tham so thu 4
 */
$content = preg_replace($pattern, $replace, $content, 1);
// $content = preg_replace($pattern, $replace, $content);

echo $content;
