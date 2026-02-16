<?php
// Abstract class (Abstraction)
abstract class Vehicle {
    private $name; // Encapsulation: private property
    protected $fuelLevel;

    public function __construct($name, $fuelLevel) {
        $this->name = $name;
        $this->fuelLevel = $fuelLevel;
    }

    // Getter and Setter (Encapsulation)
    public function getName() {
        return $this->name;
    }

    public function setFuelLevel($fuel) {
        if ($fuel >= 0 && $fuel <= 100) {
            $this->fuelLevel = $fuel;
        }
    }

    public function getFuelLevel() {
        return $this->fuelLevel;
    }

    // Abstract method (Abstraction + Polymorphism)
    abstract public function move();
}

// Inheritance: Car inherits from Vehicle
class Car extends Vehicle {
    private $type;

    public function __construct($name, $fuelLevel, $type) {
        parent::__construct($name, $fuelLevel);
        $this->type = $type;
    }

    // Polymorphism: Implementing move() differently
    public function move() {
        if ($this->fuelLevel > 0) {
            $this->fuelLevel -= 10;
            return "Car ($this->type) " . $this->name . " is moving. Fuel left: " . $this->fuelLevel . "%";
        }
        return "Car " . $this->name . " is out of fuel!";
    }
}

// Inheritance: Bike inherits from Vehicle
class Bike extends Vehicle {
    private $hasHelmet;

    public function __construct($name, $fuelLevel, $hasHelmet) {
        parent::__construct($name, $fuelLevel);
        $this->hasHelmet = $hasHelmet;
    }

    // Polymorphism: Implementing move() differently
    public function move() {
        if ($this->fuelLevel > 0 && $this->hasHelmet) {
            $this->fuelLevel -= 5;
            return "Bike " . $this->name . " is moving with helmet. Fuel left: " . $this->fuelLevel . "%";
        } elseif ($this->fuelLevel > 0) {
            return "Bike " . $this->name . " cannot move without a helmet!";
        }
        return "Bike " . $this->name . " is out of fuel!";
    }
}

// Usage
$car = new Car("Toyota", 50, "Sedan");
$bike = new Bike("Honda", 30, true);

echo "Car Name: " . $car->getName() . "<br>";
echo $car->move() . "<br>";
$car->setFuelLevel(0);
echo $car->move() . "<br>";

echo "<br>Bike Name: " . $bike->getName() . "<br>";
echo $bike->move() . "<br>";
$bike = new Bike("Yamaha", 20, false);
echo $bike->move() . "<br>";
?>