<?php
class Person {
    private $name; // Private property (encapsulated)
    private $age;

    // Constructor
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Setter for name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter for age
    public function getAge() {
        return $this->age;
    }

    // Setter for age with validation
    public function setAge($age) {
        if ($age > 0) {
            $this->age = $age;
        }
    }
}

// Usage
$person = new Person("John Doe", 25);
echo "Name: " . $person->getName() . "<br>";
echo "Age: " . $person->getAge() . "<br>";

$person->setName("Jane Doe");
$person->setAge(30);
echo "Updated Name: " . $person->getName() . "<br>";
echo "Updated Age: " . $person->getAge() . "<br>";
?>