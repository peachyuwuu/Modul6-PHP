<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopar repetition</title>
</head>

<body>
    <h1>Loopar repetition</h1>

    <p>Använd en for-loop för att skriva ut siffrorna 1-10</p>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo $i . " ";
    }
    ?>
    <p>Skapa en array som tillsammans blir en mening. Använd en for-loop för att skriva ut hela meningen.</p>
    <?php

    $words = ["det", "här", "är", "min", "mening"];

    for ($i = 0; $i < count($words); $i++) {
        echo $words[$i] . " ";
    }

    ?>

    <p>
        Skapa två arrayer med samma storlek av siffror. Gör en for-loop som skriver ut summorna av elementen parvis.
        t.ex [1,2,3] [4,5,6] skriver ut: 5 7 9
    </p>
    <?php

    $numbers1 = [2, 4, 6, 8];

    $numbers2 = [3, 6, 9, 12];

    

    for ($i = 0; $i < count($numbers1); $i++) {
        echo $numbers1[$i] + $numbers2[$i] . " ";
    }

    ?>

    <br>

    <?php

    $numbers3 = [6, 7, 8, 9, 10];

    $numbers4 = [5, 10, 15];

    $count_limit = count($numbers4);

    if (count($numbers3) < count($numbers4)) {
        $count_limit = count($numbers3);
    }

    for ($i=0; $i < $count_limit; $i++) { 
        echo $numbers3[$i] + $numbers4[$i] . " ";
    }

    ?>
</body>

</html>