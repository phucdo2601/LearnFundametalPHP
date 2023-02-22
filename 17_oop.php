<?php
/* --- Object Oriented Programming -- */

/*
  From PHP5 onwards you can write PHP in either a procedural or object oriented way. OOP consists of classes that can hold "properties" and "methods". Objects can be created from classes.
*/
class User
{
    // Properties are just variables that belong to a class.
    // Access Modifiers: public, private, protected
    // public - can be accessed from anywhere
    // private - can only be accessed from inside the class
    // protected - can only be accessed from inside the class and by inheriting classes
    public $name;
    public $email;
    public $password;

    // The constructor is called whenever an object is created from the class.
    // We pass in properties to the constructor from the outside.
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }


    // Methods are functions that belong to a class.
    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    // Destructor is called when an object is destroyed or the end of the script.

}

/* ----------- Inheritence ---------- */

/*
  Inheritence is the ability to create a new class from an existing class.
  It is achieved by creating a new class that extends an existing class.
*/
class Employee extends User {
    private $title;

    public function __construct($name, $email, $password, $title) {
        //tu khoa giup ke thua noi dung tu class cha
        parent::__construct($name, $email, $password);
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }
}

// Instantiate a new user
// $user1 = new User();
// $user2 = new User();

// // $user1->name = 'PhucDO';

// $user1->setName('PhucDO');
// $user2->setName('John');

// // var_dump($user1);
// // var_dump($user2);
// echo $user1->getName();
// echo $user2->getName();

// $user1 = new User("Phuc Do", "testMail01@gmail.com", "12345678");
// var_dump($user1);

$emp1 = new Employee("Phuc Do", "testMail01@gmail.com", "12345678", "LEADER");

echo $emp1->getTitle();