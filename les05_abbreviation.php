<?php

// .	Ký hiệu chấm. Biểu diễn bất kỳ ký tự nào ngoài trừ ký tự xuống dòng
// [ ]	Mô tả một tập hợp các ký tự, các mẫu.
// [^ ]	Tập hợp ký tự phủ định. Phù hợp nếu không có ký tự nào trong [^ ]
// *	Lặp lại 0 đến nhiều lần.
// +	Lặp lại 1 hoặc nhiều lần
// ?	Tùy chọn có hay không cho mẫu phía trước
// {n,m}	Độ dài tối thiểu là n tối đa là m
// (xyz)	Biểu diễn một nhóm ký tự (có xét đến thứ tự của các ký tự).
// |	Biểu diễn thay thế, (phép toán or, hoặc)
// \	Dùng để biểu diễn ký tự đặc biệt [ ] ( ) { } . * + ? ^ $ \ |
// ^	Điểm bắt đầu của dòng.
// $	Điểm kết thúc của dòng
// \w	Chữ,sô, và _, tương đương với: [a-zA-Z0-9_]
// \W	Ngoài bảng chữ cái, tương đương với: [^\w]
// \d	Các số: [0-9]
// \D	Không phải số: [^\d]
// \s	Là ký tự trắng, tương đương với: [\t\n\f\r\p{Z}]
// \S	Không phải ký tự trắng: [^\s]

/**
 * Check validate username
 * have no capture characters, number, (-), (_)
 * start with no capture characters
 */
// $subject = "hoangan_web";

// $pattern = "/^[a-z]+[a-z0-9-_]*$/";

// $check = preg_match($pattern, $subject);
// if ($check == true) {
//     var_dump("Validate string digit " . $subject . " is valid => success");
//     die();
// } else {
//     var_dump("Validate string digit " . $subject . " is not match");
//     die();
// }

/**
 * ex2: Check validate phone number
 * start with 0
 * have phone number lenght is 10
 */
$phone = '0987215804';

// $pattern = '/^0[0-9]{9}$/';
$pattern = '/^0\d{9}$/';

$check = preg_match($pattern, $phone);
if ($check == true) {
    var_dump("Validate phone digit " . $phone . " is valid => success");
    die();
} else {
    var_dump("Validate phone digit " . $phone . " is not match");
    die();
}
