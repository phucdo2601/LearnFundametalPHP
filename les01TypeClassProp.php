<?php

class Person
{
    public int $id;
    public string $name;
}


function getPerson()
{
    $person = new Person();

    $person->id = 1;
    $person->name = "John";

    return [
        'id' => $person->id,
        'name' => $person->name
    ];
}

$x = getPerson();
var_dump($x);
