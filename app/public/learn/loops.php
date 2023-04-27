<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loopar</title>
</head>

<body>
    <h1>PHP Loopar - Uppgifter</h1>
    <h3>Uppgift 1.</h3>


    <?php

    for ($i = 1; $i < 11; $i++) {
        echo "$i <br>";
    }

    ?>

    <h3>Uppgift 2.</h3>

    <?php

    // Alternativ 1
    $a = 0;
    while ($a <= 20) {
        echo "$a <br>";
        $a += 2;
    }

    ?>

    <h3>Uppgift 2. Alternativ 2</h3>

    <?php

    // Alternativ 2
    $a = 0;
    while ($a <= 20) {

        if ($a % 2 === 0) {
            echo "$a <br>";
            $a += 2;
        }
    }

    ?>

    <h3>Uppgift 3.</h3>

    <?php

    $b = -1;
    do {
        $b = rand(0, 10);
        echo $b . " ";
    } while ($b !== 5);

    ?>

    <h3>Uppgift 4.</h3>

    <?php

    $person = ["name" => "Bob", "age" => 25, "hobby" => "cooking", "hasDrivingLicence" => true];
    foreach ($person as $key => $value) {
        echo "$key => $value <br>";
    }

    ?>

    <h3>Uppgift 5.</h3>

    <?php

    echo "<table>";

    for ($c = 1; $c <= 10; $c++) {
        echo "<tr>";

        for ($factor = 1; $factor <= 10; $factor++) {
            echo "<td> " . $c * $factor . "</td>";
        }
    }

    echo "</table>";

    ?>

    <h3>Uppgift 5.1</h3>

    <table>

        <?php


        for ($d = -5; $d <= 5; $d++) {
            echo "<tr>";

            for ($e = -5; $e <= 5; $e++) {
                echo "<td> " . $d * $e . "</td>";
            }
        }

        ?>

    </table>

    <h3>Uppgift 5.2</h3>
    <style>
        td {
            width: 20px;
            height: 20px;
        }

        .black {
            background-color: black;
        }
    </style>

    <?php


    $nrows = 8;
    $ncols = 8;

    echo "<table>";
    for ($row = 0; $row < $nrows; $row += 1) {
        echo "<tr>";
        for ($col = 0; $col < $ncols; $col += 1) {
            if (($col + $row) % 2 === 0) {
                echo "<td class='black'></td>";
            } else {
                echo "<td></td>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";

    ?>

    <h3>Uppgift 6.</h3>

    <h3>Uppgift 7.</h3>

    <?php

    $numbers = [3, 6, 9, 12, 15, 18, 21];

    $total = 0;

    foreach ($numbers as $key => $value) {
        $total += $value;
    }

    echo $total . "<br>";

    ?>

    <h3>Uppgift 8.</h3>

    <h3>Uppgift 9.</h3>

    <h3>Uppgift 10.</h3>

    <?php

    $numbers = [
        [1, 2, 3],
        [4, 5, 6, 7],
        [7, 8]
    ];

    echo $numbers[0][0] . ", " . $numbers[1][0] . ", " . $numbers[2][0] . "<br>";

    // Använd funktionen var_dump($arr) för att skriva ut array till DOM:en
    // Skriv ut hela 2-dim arrayen med en for-loop

    // echo var_dump($numbers);

    $total = 0;

    for ($i = 0; $i < count($numbers); $i++) {
        // var_dump($numbers[$i]);
        // echo "<br>";

        $innerArrLenght = count($numbers[$i]);

        for ($k = 0; $k < $innerArrLenght; $k++) {
            $total += $numbers[$i][$k];
        }
    }

    echo "total: $total <br>";

    foreach ($numbers as $row) {
        foreach ($row as $number) {
            $total += $number;
        }
    }

    echo "total: $total";

    ?>


</body>

</html>