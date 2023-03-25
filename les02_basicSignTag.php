<?php

$phone = '0987215804';

// $pattern = '@^0[0-9]{9}$@';
// $pattern = '!^0[0-9]{9}$!';
// $pattern = '~^0[0-9]{9}$~';
// $pattern = '#^0[0-9]{9}$#';
$pattern = '!^0[0-9]{9}$!';

$check = preg_match($pattern, $phone, $matches);

var_dump($check);

echo '<pre>';
print_r($matches);
echo '<pre>';
