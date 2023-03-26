<?php

$string = 'https://vnexpress.net/';

/**
 * Modifier la thong so cau hinh cho chuoi pattern
 * Moi modifier co mot tac dung nhat dinh va co the ket hop nhieu modifier trong  1 pattern
 * Modifier dc dat sau dau phan cach
 * Co rat nhieu modifier
 */

/**
 * i: khong phan biet chu hoa chu thuong (Thuong dc dung kiem tra url)
 */
// $pattern = '~Https://[a-z]+[a-z0-9-_\.]*\.[a-z]{2,}~i';

/**
 * u: Ho tro pattern Tieng Viet
 */
$pattern = '~Https://[a-z]+[a-z0-9-_\.]*\.[a-z]{2,}~i';

$check = preg_match($pattern, $string);

var_dump($check);
echo '<hr/>';

$string = 'Quận Bình Thạnh';

/**
 * u: Ho tro pattern Tieng Viet
 */
$pattern = '/(Quận)/u';

$string = preg_replace($pattern, '', $string);

echo $string;

echo '<hr/>';

/**
 * s: Tim kien ca chuoi xuong dong (single line)
 */

// $html = '<div class="post-lists">' . "\n" . '
// <h3>Bai Viet 1</h3>' . "\n" . '
// <div class="description">
//     Mo ta bai viet
// </div>' . "\n" . '
// </div>';

// /**
//  * Boc tach du lieu
//  */
// $pattern = '~<div class="post-lists">(.+)</div>~siu';
// preg_match($pattern, $html, $matches);

// if (!empty($matches[1])) {
//     $htmlInner = $matches[1];
//     preg_match('~<h3.*>(.+)</h3>~isu', $htmlInner, $matches);

//     echo '<pre>';
//     print_r($matches);
//     echo '</pre>';

//     if (!empty($matches[1])) {
//         $title = trim($matches[1]);

//         echo 'Tieu de: ' . $title;
//     }
// }

/**
 * m: Tim kiem dau chuoi cuoi chuoi tren mot dong (chuoi dang multiline)
 */
$html = '<ul class="list">
    <li>0867864564</li>
    <li>0534535334</li>
    <li>0987215804</li>
</ul>';

// echo $html;

$pattern = '~^<li>(0\d{9})</li>$~im';

// preg_match($pattern, $html, $matches);
preg_match_all($pattern, $html, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';

if (!empty($matches[1])) {
    echo 'Danh sach so dien thoai hop le';
    foreach ($matches[1] as $phone) {
        # code...
        echo '-' . $phone . '<br/>';
    }
}
