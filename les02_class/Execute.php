<?php

class Execute
{
    $a = new Calculator();
    $a->number_a = 15;
    $a->number_b = 5;
    $res = $a->makeTotal($a->__getNumberA(), $a->__getNumberB());
    var_dump($res);
}
