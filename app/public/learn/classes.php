<?php

declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasser</title>
</head>

<body>
    <h1>Player class</h1>
    <?php


    class Player
    {
        private string $name;
        private int $strenght_level;

        public function __construct($name, $strenght_level)
        {
            $this->name = $name;
            $this->strenght_level = $strenght_level;
        }

        public function punch()
        {
            echo "POW! $this->name is punching with $this->strenght_level power level!";
        }
    }

    $my_player = new Player("Bob", 10000);

    $my_player->punch();

    ?>

    <h2>Plant klass</h2>

    <?php

    // 4 egenskaper
    // Färg, höjd, massa, lukt
    // Metoder
    // Fotosyntes, växa, cellandning

    class Plant
    {
        // Properties
        private string $color;
        private float $lenght;
        private float $mass;
        private string $scent;
        private float $sugar_level;
        private float $oxygen_level;

        public function __construct(string $color, float $lenght, float $mass, string $scent)
        {
            $this->color = $color;
            $this->lenght = $lenght;
            $this->mass = $mass;
            $this->scent = $scent;
            $this->sugar_level = 0.0;
            $this->oxygen_level = 0.0;

            echo "A plant has been born! <br>";
        }

        public function photosynthesis(float $sunlight)
        {
            // Omvandlar solljus till energi
            echo "Converting sunlight to energy! <br>";
            $this->sugar_level += $sunlight * 0.01;
            echo "SugarLevel is $this->sugar_level <br>";
        }

        // Create a function called respirate
        // It should consume oxygen
        // It should echo the status of lenght and mass

        public function respirate(float $oxygen)
        {
            echo "Consuming oxygen <br>";
            $this->oxygen_level += $oxygen * 0.5;
            echo "Oxygen level is $this->oxygen_level <br>";
        }

        public function respirate2($oxygen)
        {
            if (
                $this->mass += 0.01 * $oxygen
            ) {
                $this->lenght += 0.02 * $oxygen;
                $this->sugar_level -= 0.1 * $oxygen;

                echo "Plant has grown! Lenght is $this->lenght and mass is $this->mass <br>";
            } else {
                echo "Not enough sugar to grow";
            }
        }

        private function grow($oxygen)
        {
            $this->mass += 0.01 * $oxygen;
            $this->lenght += 0.02 * $oxygen;
            $this->sugar_level -= 0.1 * $oxygen;
        }
    }

    $kaktus = new Plant("green", 120.12, 3.0, "mildly sweet desert");

    $kaktus->photosynthesis(200);

    $kaktus->respirate(50);

    $kaktus->respirate2(10);

    // $kaktus->grow(100);

    // var_dump($kaktus);

    ?>

    <h2>Vehicle</h2>

    <?php

    // Gör en klass som heter vehicle
    // Den ska ha minst följande egenskaper
    // amount_of_wheels, amount_of_passengers, brand, color, top_speed, horse_power
    // Skapa en construktor som initialiserar dessa värden



    class Vehicle
    {
        // Properties
        private int $amount_of_wheels;
        private int $amount_of_passengers;
        private string $brand;
        private string $color;
        private float $top_speed;
        private float $horse_power;

        public function __construct(int $amount_of_wheels, int $amount_of_passengers, string $brand, string $color, int $top_speed, int $horse_power)
        {
            $this->amount_of_wheels = $amount_of_wheels;
            $this->amount_of_passengers = $amount_of_passengers;
            $this->brand = $brand;
            $this->color = $color;
            $this->top_speed = $top_speed;
            $this->horse_power = $horse_power;
        }

        public function properties($properties)
        {
            echo $properties;
        }


        public function describe()
        {
            // echo "This vehicle has: $this->amount_of_wheels wheels <br>";
            // echo "This vehicle has: $this->amount_of_passengers passengers <br>";
            echo "Vehicle: <br>";
            foreach ($this as $property_name => $property_value) {
                echo "$property_name => $property_value <br>";
            }
            echo "<br>";
        }
    }

    $my_car = new Vehicle(4, 5, "Volvo", "Silver", 210, 301);
    $my_bike = new Vehicle(2, 2, "BMW", "Black", 250, 160);


    $my_car->describe();
    $my_bike->describe();



    ?>

    <h2>Inheritance</h2>

    <?php

    class Person
    {
        private string $name;

        public function __construct($name)
        {
            $this->name = $name;
        }
    }

    class Student
    {
        private string $name;
        private float $average_grade;

        public function introduce()
        {
            echo "Hi, my name is $this->name, I am a student. My average grade score is $this->average_grade.";
        }
    }

    class Teacher
    {
        private string $name;
        private array $subjects;

        public function __construct($name, $subjects)
        {
            $this->name = $name;
            $this->subjects = $subjects;
        }

        public function introduce()
        {
            echo "Hi, my name is $this->name, I am a teacher. My subjects are " . implode($this->subjects[0]) . "<br>";
        }
    }

    // Make a student
    $a_student = new Student("Bob", 3.87);
    // Introduce student
    $a_student->introduce();


    // Make a teacher
    $a_teacher = new Teacher("Lisa", ["Mathematics", "Chemistry"]);
    // Introduce teacher
    $a_teacher->introduce();


    ?>
</body>

</html>