<?php

/**
 * Get phone number in document content
 */

$subject = 'Lorem ipsum dolor sit amet, consectetur 0987215804 adipiscing elit. Vestibulum nec eleifend turpis, sit amet luctus nisi. 
Donec maximus odio turpis, in venenatis elit finibus at. Curabitur id 0123456789 magna placerat, molestie est a, vestibulum eros. 
Pellentesque lobortis ultrices erat vehicula tincidunt. Sed nec nisl id odio feugiat hendrerit. Donec nibh neque, fringilla 
vitae efficitur sed, auctor non odio. Cras placerat 0123456733 aliquam tortor, id pharetra lectus 0123456744 suscipit finibus. Sed rutrum bibendum euismod. 
Morbi at augue in tortor imperdiet placerat ac eu lorem. In maximus, felis pretium facilisis vehicula, metus nisi suscipit quam, 
vitae bibendum purus nisl at risus.';

$pattern = '/0\d{9}/';

/**
 * Luu y: Neu muon cat noi dung nao ta chi viet bieu thuc lien quan den noi dung do
 */

/**
 * Ham pre_match() se so khop voi gia tri dau tien
 */
// preg_match($pattern, $subject, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';

// if (!empty($matches[0])) {
//     echo 'Finding Phone number: ' . $matches[0];
// } else {
//     echo 'Dont have a phone number';
// }

echo '<hr/>';

/**
 * Ham preg_match_all() se so khop voi tat ca gia tri khop voi so sanh
 */
preg_match_all($pattern, $subject, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';

if (!empty($matches[0])) {
    echo 'Finding Phone numbers: <br/>';
    foreach ($matches[0] as $item) {
        # code...
        echo '- ' . $item . '<br/>';
    }
} else {
    echo 'Dont have a phone number';
}
