<?php
require_once 'Caculator.php';

$a = new Calculator(4, 78);
// $a->number_a = 15;
// $a->number_b = 5;
$a->__setNumberA(100);
$a->__setNumberB(10);
$res = $a->makeAdd($a->__getNumberA(), $a->__getNumberB());
var_dump($res);

echo '<hr/>';

echo '<h3> Thong bao ket qua: </h3>';

$a->showResult($a::_MSG_CONTENT, $a->makeAdd($a->__getNumberA(), $a->__getNumberB()));
