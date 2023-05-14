<?php


$a = 6;
$b = 6;

/**
 * Ternary Operation
 */
// $result = $a > $b ? $a : $b;

// echo $result;

/**
 * Spaceship Operation
 */
// $result = $a <=> $b; -1 => a < b
$result = $a <=> $b; //0 => a === b
// $result = $a <=> $b; 1 => a > b

echo $result;
