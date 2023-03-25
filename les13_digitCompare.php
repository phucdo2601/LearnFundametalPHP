<?php

$content = 'Lorem Ipsum is simply dummy 0987215806 text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s 
standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type 
specimen book. 0987215804 It has survived not only contact@unicode.vn five centuries, but also 0987215801 the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with ngocphucdo2601@gmail.com the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
echo $content;
echo '<hr/>';

$pattern = '~(0\d{9})~';
$replace = '<a href="tel:$1">$1</a>';
$content = preg_replace($pattern, $replace, $content);

$content = preg_replace('~([a-z]+[a-z-_\.0-9]{2,}@([a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}))~', '<a href="mailto:$2">$1</a>', $content);

echo $content;
