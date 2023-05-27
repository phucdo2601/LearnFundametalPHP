<?php
//setting a cookie
setcookie("username", "phucdo2601", time() + 1 * 1 * 60 * 60);

echo $_COOKIE['username'];
setcookie("username", "", time() - 3600);
