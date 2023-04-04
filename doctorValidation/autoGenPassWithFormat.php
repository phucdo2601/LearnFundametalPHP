<?php

class TestAuthoGenPass
{

    public function autoGenPass()
    {
        $count = 1;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $result = "";
        while (true) {
            for ($i = 0; $i < 8; $i++) {
                $result .= $characters[random_int(0, strlen($characters) - 1)];
            }
            if ($this->isValidatePass($result)) {
                break;
            }
            $count++;
        }

        return $count;
    }

    public function isValidatePass($data)
    {
        $pattern = '/^(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z].*[a-z].*[a-z].*[a-z]).{8}$/';
        // $pattern = '/^(?=.*[0-9])(?=.*[a-z]).{8}$/';
        $check = preg_match($pattern, $data);
        return $check;
    }
}

$a = new TestAuthoGenPass();
var_dump($a->autoGenPass());
die();
