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

    for ($i=1; $i < 11; $i++) { 
        echo "$i <br>";
    }

?>

    <h3>Uppgift 2.</h3>

<?php

// Alternativ 1
    $a = 0;
    while ($a <= 20) {
        echo "$a <br>";
        $a +=2;
    }

?>

<h3>Uppgift 2. Alternativ 2</h3>

<?php

// Alternativ 2
    $a = 0;
    while ($a <= 20) {

        if ($a % 2 === 0) {
            echo "$a <br>";
            $a +=2;   
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

    $person = [ "name" => "Bob", "age" => 25, "hobby" => "cooking", "hasDrivingLicence" => true];
    foreach ($person as $key => $value) {
        echo "$key => $value <br>";
    }

?>

<h3>Uppgift 5.</h3>

<?php

    echo "<table>";
    
    for ($c=1; $c <= 10; $c++) {
        echo "<tr>";

        for ($factor=1; $factor <= 10; $factor++) {
            echo "<td> " . $c * $factor . "</td>";
        }
    }

    echo "</table>";

?>

<h3>Uppgift 5.1</h3>

<table>

<?php


    for ($d=-5; $d <= 5; $d++) {
        echo "<tr>";

        for ($e=-5; $e <= 5; $e++) {
            echo "<td> " . $d * $e . "</td>";
        }
    }
    
?>

</table>

<h3>Uppgift 5.2</h3>
<style>
    td {
        width:20px;
        height:20px;
    }
    .black {
        background-color: black;
    }
</style>

<?php


    $nrows = 8;
    $ncols = 8;

    echo "<table>";
    for ($row=0; $row < $nrows; $row +=1) { 
        echo "<tr>";
        for ($col=0; $col < $ncols; $col +=1) { 
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

<h3>Uppgift 6</h3>

<h3>Uppgift 7</h3>

<?php

$numbers = [3, 6, 9, 12, 15, 18, 21];

$total = 0;

foreach ($numbers as $key => $value) {
    $total += $value;
}

echo $total . "<br>";

?>

</body>
</html>