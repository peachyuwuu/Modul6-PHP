<?php

$title = "Strängar - strings";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>

    <!-- Inkludera sidhuvud -->
    <?php

    include "_includes/header.php";

    ?>

    <!-- Visa title i ett h1 element -->
    <h1><?= $title ?></h1>

    <?php

    // En variabel deklareras med inledande $
    $name = "Bengt Andersson";

    echo $name;

    // Variablers namn skrivs som snake_case i PHP: små bokstäver a-z,
    // understreck mellan orddelar

    // snake_case
    // kebab-case
    // camelCase
    // PascalCase

    // Ett förnamn
    $first_name = "Sven";
    $fname = "Erik";

    // Ett efternamn
    $last_name = "Andersson";

    // Kontrollera vilken datatyp en variabel har
    // gettype

    echo "<br>";
    echo gettype($first_name);
    echo "<br>";

    // Strängar slås ihop med punkt
    echo "Variabeln med namnet last_name: <b>$last_name</b>, har datatypen:" . gettype($last_name);

    // En variabel med namnet comment
    $comment = "PHP är ju kul";

    echo "<br>";
    // Hur många tecken har variabeln - strlen
    $number_of_characters = strlen($comment);

    echo "Kommentaren <i>$comment</i> har $number_of_characters tecken";

    // Uppgift
    // För att validera en variabel kan olika strängmetoder användas
    // Gör något vettigt med följande metoder
    // Ta bort eventuella inledande mellanslag med trim
    // Räkna ord med str_word_count
    // Repetera en sträng med str_repeat
    // Ersätt ett ord i en mening med str_replace
    // Testa exempelvis olika ordspråk
    $proverb = "    Allt är inte guld som glimmar        ";

    // Antal tecken innan trim
    $number_before = strlen($proverb);

    // Använd funktionen för att ta bort blanksteg
    $proverb = trim($proverb);

    $number_after = strlen($proverb);

    echo "<br>";
    echo "Ordspråket $proverb hade innan trim $number_before tecken, och efter trim $number_after tecken";
    echo "<br>";

    $promise = "Jag lovar att lära mig stava till programmering <br>";
    $result = str_repeat($promise, 10);
    echo $result;

    // Fixa stora tecken till små tecken - obs funkar kanske inte med svenska tecken som ÅÄÖ
    $message = "ALLT ÄR BARA EN STOR KONSPIRATION";
    echo "<br>";

    echo strtolower($message);

    echo "<br>";
    $str = "     This   is  a      comment   ";
    echo $str . "<br>";
    echo trim($str, " ");


    $str_word = "I wonder how many words there are in this sentence...";
    echo "<br>" . $str_word . "<br>";
    echo str_word_count($str_word);


    $str_rep = "Nice!";
    echo "<br>";
    echo str_repeat($str_rep, 11);


    $str_repl = "Have a terrible day!";
    echo "<br>";
    echo str_replace("terrible", "lovely", $str_repl);

    $str_proverb = "Actions speak louder than words.";
    echo "<br>";
    echo str_replace("speak", "scream", $str_proverb);


    $str_shuffle = "0 1 2 3 4 5 6 7 8 9";
    echo "<br>";
    echo str_shuffle($str_shuffle);


    // En sträng i PHP kan skapas med "" eller ''

    $test = 'Som man bäddar får man ligga';

    // Uppgift: Skapa ett HTML element och ange style attributet för att ändra bakgrundsfärg
    // Innehållet i elementet ska vara en text om något


    echo "<p style='background-color: coral'>$test</p>";
    echo '<p style="background-color: coral">$test</p>';

    echo '<p style="background-color: coral">' . $test . '</p>';

    // Ett alternativ är att använda escape tecknet \ innan tecknet som ska vara gällande
    echo "<p style=\"background-color: yellow\">$test</p>";


    ?>

    <?php

    include "_includes/footer.php";

    ?>

</body>

</html>