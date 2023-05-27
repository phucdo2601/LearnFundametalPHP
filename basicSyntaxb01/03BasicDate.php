<?php
$today = date('D d/m/Y');

// echo $today;

// echo date("d/m/Y") . "<br>";
// echo date("d-m-Y") . "<br>";
// echo date("d.m.Y");

// echo date("H:i:s") . "<br>";
// echo date("F d, Y h:i:s A") . "<br>";
// echo date("h:i a");

// Executed at March 05, 2014 07:19:18
// $timestamp = time();
// echo ($timestamp) . "<br>";
// echo (gettype($timestamp));

// $timestamp = 1685171805;
// echo (date("F d, Y h:i:s", $timestamp));

// Get the weekday name of a particular date
// echo date('l', mktime(0, 0, 0, 5, 27, 2023));

// Executed at March 05, 2014
$futureDate = mktime(0, 0, 0, date("m") + 30, date("d"), date("Y"));
echo date("d/m/Y", $futureDate);
