<?php

declare(strict_types=1);

$title = "Funktioner";

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
     * @param  string $element
     * @return void
     */
    function render_total(int $price, int $amount, string $element)
    {

        // Validera inkommande argument
        // Ex är det ok med negativa tal?
        // Vilka HTML element ska kunna anges?
        if ($price < 0 || $amount < 0) {
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

    render_total(3, 80, "h21");


    ?>

    <?php

    include "_includes/footer.php";

    ?>

</body>

</html>