<?php


class Person
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
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

function getListPerson()
{
    $listPerson = [
        new Person(1, 'john'),
        new Person(2, 'Jim'),
        new Person(3, 'Ace'),
    ];

    // return array_map(function ($listPerson) {
    //     return $listPerson->name;
    // }, $listPerson);

    return array_map(fn ($person) => $person->name, $listPerson);
}

$listTest = getListPerson();
var_dump($listTest);
