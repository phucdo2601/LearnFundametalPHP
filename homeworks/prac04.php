<?php

$subject = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec eleifend turpis, 
sit amet luctus nisi.</p>
<p><img src="https://picsum.photos/450" alt=""/></p>
<h2>What is Lorem Ipsum?</h2>
<p> Donec maximus odio turpis, in venenatis elit finibus at. Curabitur id magna 
placerat, molestie est a, vestibulum eros. Pellentesque lobortis ultrices erat vehicula tincidunt. 
Sed nec nisl id odio feugiat hendrerit.</p> 
<h2>Where is come from?</h2>
<p>Donec nibh neque, fringilla vitae efficitur sed, auctor non odio. 
Cras placerat aliquam tortor, id pharetra lectus suscipit finibus. Sed rutrum bibendum euismod. Morbi at 
augue in tortor imperdiet placerat ac eu lorem. In maximus, felis pretium facilisis vehicula, metus nisi 
suscipit quam, vitae bibendum purus nisl at risus.</p>
';

$pattern = '~<img(\s+[a-z]+\s*=\s*"[^"]*")*\s+src\s*=\s*"[^"]+"(\s+[a-z]+\s*=\s*"[^"]*")*\s*(/>|>)~';
$check = preg_match($pattern, $subject);
if ($check == true) {
    var_dump("Validate subject digit " . $subject . " is to have image => success");
    // die();
} else {
    var_dump("Validate subject digit " . $subject . " error beacause does not have image.");
    // die();
}
