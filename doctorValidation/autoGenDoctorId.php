<?php
function writeMsg()
{
    $result = "XE";
    $num = 0;
    for ($i = 0; $i < 6; $i++) {
        $num = (string) mt_rand(0, 6);
        $result .= $num;
    }
    return $result;
}

// writeMsg(); // call the function

var_dump(writeMsg());
