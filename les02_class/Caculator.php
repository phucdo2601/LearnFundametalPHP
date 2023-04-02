<?php

// namespace Demo;

class Calculator
{
    /**
     * trong php cac thuoc tinh ma khong dua pham vi truy cap thi nen dung tu khoa var(ngam dinh la public)
     */
    public $number_a;
    public $number_b;

    public $number_c = 30;

    private $math;

    private $username;
    private $password;

    //khai bao hang so
    const _MSG_CONTENT = 'Ket qua la: {value}';

    public function __construct($number_a, $number_b, $username, $password)
    {
        var_dump('Ham Khoi tao');
        $this->number_a = $number_a;
        $this->number_b = $number_b;
        $this->username = $username;
        $this->password = $password;
        $this->math = new Math();

        // var_dump($this->math);
    }

    public function __getNumberA()
    {
        return $this->number_a;
    }

    public function __getNumberB()
    {
        return $this->number_b;
    }

    public function __getUsername()
    {
        // return $this->username;
        $this->showInfo('username', $this->username);
    }

    public function __getPassword()
    {
        // return $this->password;
        $this->showInfo('password', $this->password);
    }

    public function __setNumberA($number_a)
    {
        $this->number_a = $number_a;
    }

    public function __setNumberB($number_b)
    {
        $this->number_b = $number_b;
    }

    public function __setUsername($username)
    {
        $this->username = $username;
    }

    public function __setPassword($password)
    {
        $this->password = $password;
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

    public function showInfo($type, $value)
    {
        if ($type == 'username') {
            var_dump('Username: ' . $value);
        } elseif ($type == 'password') {
            var_dump('Password: ' . $value);
        } else {
            var_dump('Not valid');
        }
    }

    public function sqrt($number)
    {
        if (is_float($number)) {
            return $this->math->sqrt($number);
        }

        return 0;
    }

    public function __destruct()
    {
        var_dump('Ham Huy');
    }
}
