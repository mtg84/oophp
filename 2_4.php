<?php

class User{
    
    public $name;
    public $age;

    // Runs when an object is crated
    public function __construct($name, $age){
        echo 'Class ' . __CLASS__ . ' instantiated <br>';
        echo 'constructor runnig';
        $this->name = $name;
        $this->age = $age;
    }

    // Called when no other references to a certain object
    // Used for cleanup, closing connections, etc
    public function __destruct(){
        echo '<br><br>';
        echo "\n\ndestructor ran";
    }

    public function sayHello(){
        return $this->name . ' says hello';
    }

}

$user1 = new User('Brad', 36);

echo '<br>' . $user1->name . ' is ' . $user1->age . ' years old.';
echo '<br>';
echo $user1->sayHello();

echo '<br><br>';

$user2 = new User('Sarah', 26);

echo '<br>' . $user2->name . ' is ' . $user2->age . ' years old.';
echo '<br>';
echo $user2->sayHello();