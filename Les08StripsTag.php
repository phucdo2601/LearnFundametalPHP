<?php

function getFruit()
{

    $html = '
    <div>
        <h1>Fruit</h1>
        <hr>
    </div>
   ';
    //    strip_taps remove html tags
    return strip_tags($html, ['h1', 'hr']);
}

echo getFruit();
