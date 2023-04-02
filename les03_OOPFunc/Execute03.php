<?php

// use Demo\Calculator;

require_once 'les02_class/Caculator.php';

$cal = new Calculator(100, 200);

//Kien tra thuoc rtinh ton tai

var_dump($cal->__getNumberA());

//C2: Kien tra thuoc tinh bang ham property_exists()
if (property_exists('Calculator', 'number_c')) {
    var_dump($cal->number_c);
} else {
    var_dump('Thuoc tinh ko ton tai');
}

//Kiem tra phuong thuc ton tai
if (method_exists($cal, 'showMsg')) {
    var_dump($cal->showMsg());
} else {
    var_dump('Phuong thuc khong ton tai');
}

echo '<hr/>';

$className = Calculator::class;
echo 'Ten class la: ' . $className . '<br/>';
