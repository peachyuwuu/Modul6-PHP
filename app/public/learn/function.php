<?php

declare(strict_types=1);

$title = "Funktioner";

include "_includes/global-functions.php";

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

    <ul>
        <li>Använd beskrivande funktionsnamn</li>
        <li>Följ kodstandard för språket</li>
        <li>Validera ev parametrar|argument som finns i funktionen</li>
        <li>Använd flera funktioner - dela upp logik</li>
        <li>Dokumentera funktionen - vilka parametrar ...</li>
    </ul>

    <?php

    // En funktion för att beräkna en kostnad


    /**
     * calculate_total
     *
     * @param  mixed $price
     * @param  mixed $amount
     * @return int
     */
    function calculate_total(int $price, int $amount): int
    {
        return $price * $amount;
    }

    // Använd funktionen, spara värdet i en ny variabel
    $total = calculate_total(7, 4);


    // Presentera resultatet i ett HTML block element
    echo "<div>Kostnaden är $total</div>";

    $total = calculate_total(8, 6);
    echo "<div>Kostnaden är $total</div>";

    // Skapa en funktion med namnet render_total
    // Funktionen ska använda calculate_total och därefter
    // presentera resultatet - ex med echo

    /**
     * render_total
     *
     * @param  int $price
     * @param  int $amount
     * @param  int $in_stock
     * @param  string $element
     * @return void
     */
    function render_total(int $price, int $amount, int $in_stock, string $element)
    {

        // Validera inkommande argument
        // Ex är det ok med negativa tal?
        // Vilka HTML element ska kunna anges?
        if ($price < 0 || $amount < 0) {
            return;
        }

        // Ny kontroll av $amount - värde mellan ett intervall is_orderable()
        // Med ett inledande ! så är logiken omvänd
        if (!is_orderable($amount, $in_stock)) {
            return;
        }


        // Se till att endast följande HTML element är giltiga
        // En array med giltiga element
        $elements = ["p", "div", "h4"];
        if (!in_array($element, $elements)) {
            $element = "h1";
        }

        $total = calculate_total($price, $amount);
        echo "<$element>Kostnad: $total</$element>";
    }

    // Skapa en funktion som kontrollerar att ett värde finns mellan min och max

    /**
     * is_orderable
     *
     * @param  int $x
     * @param  int $max
     * @return void
     */
    function is_orderable(int $x, int $max = 100)
    {
        // if ($x > 0 && $x < $max) {
        //     return true;
        // } else {
        //     return false;
        // }

        // Som enrads alternativ return
        return ($x > 0 && $x < $max);
    }

    // Anropa funktionen med de argument som ska gälla
    render_total(3, 11, 25, "h21");



    // Skapa en funktion som presenterar en persons hela namn och ålder
    // Ex
    // Flisa Hedenhös, 5 år
    // Funktionen ska ta 3 parametrar, förnamn, efternamn och ålder
    // Funktionen ska rendera resultatet som HTML

    // Använd ett fjärde argument för vilken HTML element
    // HTML elementet ska vara något av följande: p, div, span
    // Används funktionen med ett element som inte finns i listan ska ett förvalt finnas

    // Gör en kontroll om personen har nått en viss ålder, alternativt inte nått
    // Rendera ett välkomnande ord som du tycker passar med åldern

    function person_info(string $first_name, string $last_name, int $age, string $element)
    {

        $elements = ["p", "div", "span"];
        if (!in_array($element, $elements)) {
            $element = "pre";
        }

        echo "<$element>$first_name $last_name, $age</$element>";

        if ($age >= 18) {
            echo "Welcome to the bar";
        } else {
            echo "You're not old enough to enter the bar!";
        }
    }

    person_info("Sven", "Andersson", 38, "h20");


    // Ett exempel på hur man backend kan hantera olika språl för ex formulärfält
    // Skapa en array med standardspråk
    $english = [
        "welcome" => "Hello, welcome to this application",
        "name" => "Please enter name",
        "reset" => "Reset",
        "save" => "Save"
    ];

    $swedish = [
        "welcome" => "Hej, välkommen till applikationen",
        "name" => "Ange namn",
        "reset" => "Återställ",
        "save" => "Spara"
    ];

    $french = [
        "welcome" => "Bonjour, bienvenue à l'application",
        "name" => "Écrit votre nom",
        "reset" => "Réinitialiser",
        "save" => "Sauvegarder"
    ];

    // Skapa en array med giltiga språk
    $languages = [
        "en" => $english,
        "sv" => $swedish,
        "fr" => $french
    ];

    // En variabel för aktuellt språk
    // Skulle kunna sparas i en session, eller om man i applikationen först fått möjlighet...
    // ...att välja men nu bestämt såhär
    $language = "fr";

    ?>

    <form action="#" method="post">
        <p>
            Välkommen till applikationen!
        </p>
        <input type="text" name="first_name" placeholder="Ange förnamn">
        <input type="reset" value="Nollställ">
        <button>Spara</button>
    </form>
    <hr>
    <form action="#" method="post">
        <p>
            <?= $languages[$language]["welcome"] ?>
        </p>
        <input type="text" name="first_name" placeholder="<?= $languages[$language]["name"] ?>">
        <input type="reset" value="<?= $languages[$language]["reset"] ?>">
        <button><?= $languages[$language]["save"] ?></button>
    </form>


    <?php

    include "_includes/footer.php";

    ?>

</body>

</html>