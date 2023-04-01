<?php

class Number
{
    public $numberA = 1;
    public $numberB = 2;

    //method 
    public function makeTotal($a, $b)
    {
        return $a + $b;
    }
}

//instance object
$numObj = new Number();
$res = $numObj->makeTotal(4, 5);
var_dump($res);
die();
