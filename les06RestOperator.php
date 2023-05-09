<?php

function getFruit()
{
    $fruit = ['orange', 'apple', 'banana', 'lemon', "water melon", 'grape'];
    [$orange, $apple, $grape] = $fruit;
    return [$orange, $apple, $grape];
}

var_dump(getFruit());
