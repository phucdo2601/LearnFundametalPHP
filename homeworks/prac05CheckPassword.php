<?php

$pattern = '/^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^\*(\)-\+\.]).{8,}$/';

$password = "PhucDo.2601";

$checkPassword = preg_match($pattern, $password);

if ($checkPassword == true) {
    var_dump("Password: " . $password . " is strong => success");
    // die();
} else {
    var_dump("Password " . $password . " is weak => may be changed");
    // die();
}
