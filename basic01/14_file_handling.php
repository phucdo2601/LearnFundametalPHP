<?php

/* ---------- File Handling --------- */

/* 
  File handling is the ability to read and write files on the server.
  PHP has built in functions for reading and writing files.
*/
$file = 'extras/users.txt';

if (file_exists($file)) {
    $handle = fopen($file, 'r');
    $contens = fread($handle, filesize($file));
    fclose($handle);
    echo $contens;
} else {
    $handle = fopen($file, 'w');
    $contens = 'PhucDo' . PHP_EOL .'Sarah' . PHP_EOL .'Mike';
    fwrite($handle, $contens);
    fclose($handle);
    echo 'File does not exist, and the system will create it.';
}
