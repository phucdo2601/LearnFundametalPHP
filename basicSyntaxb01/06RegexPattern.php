<?php

// $pattern = "/ca[kf]e/";
// $text = "He was eating cake in the cafe.";

// if (preg_match($pattern, $text)) {
//     echo $text . " . The test string digit match with regex";
// } else {
//     echo $text . " . The test string digit not match with regex";
// }

// if (preg_match_all($pattern, $text)) {
//     echo $text . " . The test string digit match with regex";
// } else {
//     echo $text . " . The test string digit not match with regex";
// }

// $pattern = "/\s/";
// $replacement = "-";
// $text = "Earth resolves around\nthe\tSun";
// echo preg_replace($pattern, $replacement, $text);
// echo "<br>";

// // Replace only spaces
// echo str_replace(" ", "-", $text);

//Split digits with regex
// $pattern = "/[\s,]+/";
// $text = "My favourite colors are red, green and blue";
// $parts = preg_split($pattern, $text);

// // Loop through parts array and display substrings
// foreach ($parts as $part) {
//     echo $part . "<br>";
// }

//Pattern modifiers
// $pattern = "/color/i";
// $text = "Color red is more visible than color blue in daylight.";
// $matches = preg_match_all($pattern, $text, $array);
// echo $matches . " matches were found.";

// $pattern = "/^color/im";
// $text = "Color red is more visible than \ncolor blue in daylight.";
// $matches = preg_match_all($pattern, $text, $array);
// echo $matches . " matches were found.";

// word boudaries
$pattern = '/\bcar\w*/';
$replacement = '<b>$0</b>';
$text = 'Words begining with car: cart, carrot, cartoon. Words ending with car: scar, oscar, supercar.';
echo preg_replace($pattern, $replacement, $text);
