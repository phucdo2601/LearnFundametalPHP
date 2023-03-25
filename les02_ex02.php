<?php

// $subject = "NGOCPHUCa";
// $subject = "ngocphuc2601.web@gmail.com";
$subject = "ngocphuc2601_@gmail.com";

// $pattern = '/[_@]/'; [] dat trong dau hoac la truong hop hoac, dat binh thunog ben ngoai la va
// $pattern = '/[_@]/';


$pattern = '/[@][_]/';

$check = preg_match($pattern, $subject);

var_dump($check);
