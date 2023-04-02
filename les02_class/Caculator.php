<?php

namespace Demo;

class Calculator
{
    /**
     * trong php cac thuoc tinh ma khong dua pham vi truy cap thi nen dung tu khoa var(ngam dinh la public)
     */
    public $number_a;
    public $number_b;

    public $number_c = 30;

    //khai bao hang so
    const _MSG_CONTENT = 'Ket qua la: {value}';

    public function __construct($number_a, $number_b)
    {
        $this->number_a = $number_a;
        $this->number_b = $number_b;
    }

    public function __getNumberA()
    {
        return $this->number_a;
    }

    public function __getNumberB()
    {
        return $this->number_b;
    }

    public function __setNumberA($number_a)
    {
        $this->number_a = $number_a;
    }

    public function __setNumberB($number_b)
    {
        $this->number_b = $number_b;
    }

    public function getParams($valueA, $valueB)
    {
        if ($valueA == 0) {
            $valueA = $this->__getNumberA();
        }
        if ($valueB == 0) {
            $valueB = $this->__getNumberB();
        }

        return [
            'valueA' => $valueA,
            'valueB' => $valueB,
        ];
    }

    //dat gia tri mac dinh cho bien truyen vao
    public function makeAdd($number_a = 0, $number_b = 0)
    {
        // if ($number_a == 0) {
        //     $number_a = $this->__getNumberA();
        // }
        // if ($number_b == 0) {
        //     $number_b = $this->__getNumberB();
        // }

        $paramsArr = $this->getParams($number_a, $number_b);

        $number_a = $paramsArr['valueA'];
        $number_b = $paramsArr['valueB'];

        $res = $number_a + $number_b;
        return $res;
    }

    public function makeMinus($number_a, $number_b)
    {
        $paramsArr = $this->getParams($number_a, $number_b);

        $number_a = $paramsArr['valueA'];
        $number_b = $paramsArr['valueB'];
        return $number_a - $number_b;
    }

    public function makeMultiply($number_a, $number_b)
    {
        $paramsArr = $this->getParams($number_a, $number_b);

        $number_a = $paramsArr['valueA'];
        $number_b = $paramsArr['valueB'];
        return $number_a * $number_b;
    }

    public function makeDivide($number_a, $number_b)
    {
        $paramsArr = $this->getParams($number_a, $number_b);

        $number_a = $paramsArr['valueA'];
        $number_b = $paramsArr['valueB'];
        return $number_b > 0 ? $number_a / $number_b : 'Khong chia cho so 0';
    }

    public function showResult($msg, $value)
    {
        echo str_replace('{value}', $value, $msg);
    }

    public function showMsg()
    {
        return __CLASS__;
    }
}
$a = new Calculator(4, 78);
$a->number_a = 15;
$a->number_b = 5;
$res = $a->makeAdd($a->__getNumberA(), $a->__getNumberB());
var_dump($res);

echo '<hr/>';

echo '<h3> Thong bao ket qua: </h3>';

$a->showResult($a::_MSG_CONTENT, $a->makeAdd($a->__getNumberA(), $a->__getNumberB()));
