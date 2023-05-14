<?php

// $x  = 20;

// do {
//     echo 'Test Message';
//     $x++;
// } while ($x < 10);


// for ($x = 1; $x <= 10; $x++) {
//     echo $x . "<br/>";
// }


// for ($x = 1;; $x++) {
//     if ($x > 10) {
//         break;
//     }
//     echo $x . "<br/>";
// }

$x = 1;
for (;;) {
    if ($x > 10) {
        break;
    }
    echo $x . "<br/>";
    $x++;
}
