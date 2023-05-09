<?php

function getFruit()
{
    $fruit = ['orange', 'apple', 'banana', 'lemon'];
    $more_fruit = ["water melon", 'grape'];
    // return [...$fruit, "peach", "grape"];
    // return ['water melon', ...$fruit, "peach", "grape"];
    return [...$fruit, ...$more_fruit];
}

var_dump(getFruit());
