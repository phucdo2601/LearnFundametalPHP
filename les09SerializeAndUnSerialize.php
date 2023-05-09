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

    /**
     * serialize: getter
     * unserialize:setter
     */

    //getter 
    public function __serialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    //setter
    public function __unserialize(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }
}

function tesSerializePer()
{
    $maria = new Person(1, "Marina");

    return $maria->__serialize();
}

function tesUnSerializePer()
{
    $maria = new Person(1, "Marina");
    $maria->__unserialize([
        'id' => 2,
        'name' => 'Tommy'
    ]);
    return $maria->__serialize();
}

$x = tesSerializePer();
$y = tesUnSerializePer();
var_dump($x);
var_dump($y);
