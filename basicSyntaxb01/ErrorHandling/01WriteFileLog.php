<?php

function calcDivision($x, $y)
{
    if ($y == 0) {
        trigger_error("callDivision(): The divisor can not be zero!", E_USER_WARNING);
        return false;
    } else {
        return ($x / $y);
    }
}

function customError($errno, $errstr, $errfile, $errline, $errcontext)
{
    $message = date("Y-m-d H:i:s - ");
    $message .= "Error: [" . $errno . "], " . "$errstr in $errfile on line $errline, ";
    $message .= "Variables:" . print_r($errcontext, true) . "\r\n";

    error_log($message, 3, "logs/app_errors.log");
    die("There was a problem, please try again.");
}

set_error_handler("customError");
echo calcDivision(10, 0);
echo "This will never be printed";
