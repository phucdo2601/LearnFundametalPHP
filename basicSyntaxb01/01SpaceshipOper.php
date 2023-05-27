<?php

function testSort($a, $b)
{
    return $a <=> $b;
}

// Truong hop $a > $b => 1, bang nhau la 0, nho hon b la -1
$res = testSort(12, 4);
var_dump($res);
