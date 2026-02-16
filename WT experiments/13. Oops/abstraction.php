<?php
abstract class Vehicle {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Abstract method (must be implemented by child classes)
    abstract public function startEngine();

    // Concrete method
    public function getName() {
        return $this->name;
    }
}

class Car extends Vehicle {
    public function startEngine() {
        return "Car engine started for " . $this->name;
    }
}

// Usage
$car = new Car("Toyota");
echo $car->getName() . "<br>";
echo $car->startEngine() . "<br>";
?>