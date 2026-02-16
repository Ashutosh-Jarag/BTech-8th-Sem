<?php
class Animal {
    protected $species;

    public function __construct($species) {
        $this->species = $species;
    }

    public function getSpecies() {
        return $this->species;
    }
}

class Dog extends Animal {
    private $breed;

    public function __construct($species, $breed) {
        parent::__construct($species); // Call parent constructor
        $this->breed = $breed;
    }

    public function getBreed() {
        return $this->breed;
    }
}

// Usage
$dog = new Dog("Canine", "Labrador");
echo "Species: " . $dog->getSpecies() . "<br>";
echo "Breed: " . $dog->getBreed() . "<br>";
?>