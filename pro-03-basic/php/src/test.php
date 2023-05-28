<?php

// $str = "Hello World!";
// echo bin2hex($str) ."<br>";

// $striBin = "11110010"; // binary value of hex f2
// echo bin2hex($striBin) . "</br>";
// echo dechex(bindec($striBin));

// Sample string
// $str = "Phuc Do Ngoc";

// // Converting to hexadecimal
// $hex = bin2hex($str);
// echo $hex . "<br>";

// // Converting hex to binary string
// $data = pack("H*", $hex);
// echo $data;

// $str = " Hello World! ";
// // Chopping whitespace from the end
// echo chop($str);

// $str = "\tHello\n Phucdn!\n\t";
// // Chopping the trailing whitespace
// echo rtrim($str);

// Sample string
// $str = "Hello World!!!";

// // Chopping characters from the end
// echo chop($str, "!");

// Sample string
// $str = "Alice in Wonderland";

// // Uuencoding the string
// $encoded_str = convert_uuencode($str);
// echo $encoded_str . "<br>";

// // Decoding the string
// $decoded_str = convert_uudecode($encoded_str);
// echo $decoded_str;

// $str = "Hello World!";

// echo count_chars($str, 3);

// // Sample string
// $str = "Hello World!";

// // Getting frequency of characters in the string
// print_r(count_chars($str, 1));

// Calculating checksum
// $checksum = crc32("The mountain peaks are covered with snow.");

// // Printing formatted string
// printf("%u\n", $checksum);

//crypt
// Set the password
// $password = 'Phucdo.2601';

// Getting the hash, let the salt be automatically generated
// $hashed_password = crypt($password);
// // User entered password
// $user_input = 'Phucdo.2601';


// // Verifying the passwords
// if(hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
//    echo "Password match!";
// } else {
//     echo "Password did not match!";
// }

// The basic syntax of the explode() function is given with:
// $str = "The birbs are flying in the sky.";

// //Splitting string the space and print
// print_r(explode(" ", $str));

// Sample string
// $str = "One, Two, Three, Four, Five";

//Positive limit
//print any number characters in digit
// print_r(explode(", ", $str, 3));

//Negative limit
// print_r(explode(", ", $str, -1));

//Zero limit
// print_r(explode(", ", $str, 0));

// Sample string
$str = "Hello World!";

// // Split string using non-existent separator
// print_r(explode("|", $str));
// Decoding a hexadecimally encoded binary string
// echo hex2bin("48656c6c6f20576f726c6421");

//PHP html_entity_decode() Function
$str = "It's an <b>amazing</b> story.";

// // Encoding the string
// $encoded_str = htmlentities($str);
// echo $encoded_str . "<br>";

// // Decoding the string
// $decoded_str = html_entity_decode($encoded_str);
// echo $decoded_str;

// // Sample string
// $str = "I'll \"leave\" tomorrow.";

// // Encoding the string
// $encoded_str = htmlentities($str, ENT_QUOTES);
// echo $encoded_str. "<br/>"; /* I&#039;ll &quot;leave&quot; tomorrow. */

// // Converts only double-quotes
// $a = html_entity_decode($encoded_str);
// echo $a . "<br/>"; /* I&#039;ll "leave" tomorrow. */

// // Converts both double and single quotes
// $b = html_entity_decode($encoded_str, ENT_QUOTES);
// echo $b; /* I'll "leave" tomorrow. */

//The implode() function join array elements into a single string.
// Sample array
// $array = array("one", "two", "three", "four", "five");

// // Creating comma separated string from array elements
// echo implode("-", $array);

//md5 _calculates the MD5 (Message Digest Algorithm 5) hash of a string.
// $str = "Sparrow";

// //Calculating the hash
// echo md5($str);

// Calculating the distance
// echo levenshtein("flour", "flower")."<br>";
// echo levenshtein("weight", "wait")."<br>";
// echo levenshtein("hour", "our");

//The parse_str() function parses a query string into variables.
// Sample String
// $str = "name=Harry&age=18";

// Parsing query string
// parse_str($str, $result);
// echo $result["name"]; // Outputs: Harry
// echo $result["age"];  // Outputs: 18 

// The quoted_printable_decode() function convert a quoted-printable string to an 8-bit ASCII string.
// $str = "Hello=0AWorld!"; // "=0A" represent line feed or new line
// echo quoted_printable_decode($str);

// The quoted_printable_encode() function convert a 8 bit string to a quoted-printable string.
// $str = "Hello\nWorld!"; // "\n" represent line feed or new line
// echo quoted_printable_encode($str);

// Set locale
// setlocale(LC_ALL, "en_US");

// // Get current locale setting
// echo setlocale(LC_ALL, 0);

// Sample strings
// echo substr_compare("Hello world","world",6);

// The substr_replace() function replaces text within a portion of a string.
// $str = "Fairyland";
// $replacement = "Horror";

// // Replacing the substring
// echo substr_replace($str, $replacement, 0, 5);

// The wordwrap() function wraps a string into new lines when it reaches the specified length.
// Sample string
$str = "The word incomprehensibilities is very long.";

// Wrapping the string
echo wordwrap($str, 8, "<br>\n", true);