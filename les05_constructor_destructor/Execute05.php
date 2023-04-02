<?php
require_once "../les02_class/Caculator.php";
require_once "../les02_class/Math.php";

$cal = new Calculator(200, 100, "Phuc Do", '12234567');

echo '<br/>';
var_dump($cal->showMsg());
var_dump($cal->sqrt(9.0));

echo '<br/>';
