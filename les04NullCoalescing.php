<?php

function getFruit()
{
    $list = [
        'fruit' => ['orange', 'apple', 'banana', 'lemon'],
    ];
    // $list['fruit'] ??= ['orange', 'apple', 'banana', 'lemon'];
    return $list;
}

var_dump(getFruit());
