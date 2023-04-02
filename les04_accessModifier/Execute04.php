<?php

require_once '../les02_class/Caculator.php';

$cal = new Calculator(200, 100, 'Phuc Do', '12345678');
var_dump($cal->__getUsername());
