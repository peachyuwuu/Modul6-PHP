<?php

declare(strict_types=1);

include "_includes/global-functions.php";

$title = "GET och POST Request";

// Kontrollera post request
print_r2($_POST);

print_r2($_SERVER['REQUEST_METHOD']);

// Deklarera variabler som kan visa ett värde i olika formulärfält
$first_name = "";
$country = "";
$greeting = "";
$email = "";

// Om en post request har gjorts ändra variablers värden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kolla first_name
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";

    // Se till att inga blanksteg finns i strängen
    $first_name = trim($first_name);

    // Kolla country
    $country = isset($_POST['country']) ? $_POST['country'] : "";

    // Kolla greeting
    $greeting = isset($_POST['greeting']) ? $_POST['greeting'] : "";

    // Eventuella HTML element kan förhindras med den inbyggda PHP funktionen htmlspecialchars
    $greeting = htmlspecialchars($greeting);

    // Kolla e-post
    $email = isset($_POST['email']) ? $_POST['email'] : "";

}

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

    <a href="<?= $_SERVER['PHP_SELF'] ?>">Läs in sidan igen</a>

    <!-- Ett formulär med olika fält -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>
            Förnamn:
            <input type="text" name="first_name" id="" value="<?= $first_name ?>">
        </p>

        <p>
            <select name="country" id="">
                <option value="sweden" <?= $country === "sweden" ? "selected" : "" ?>>Sverige</option>
                <option value="norway" <?= $country === "norway" ? "selected" : "" ?>>Norge</option>
                <option value="denmark" <?= $country === "denmark" ? "selected" : "" ?>>Danmark</option>
            </select>
        </p>

        <p>
            <textarea name="greeting" id="" cols="30" rows="10" placeholder="Ange hälsningsfras"><?= $greeting ?></textarea>
        </p>

        <!-- Uppgift: Skapa följande fält, e-mail, condition -->
        <p>
            <input type="email" name="email" id="" placeholder="Ange e-postadress" value="<?= $email ?>">
        </p>

        <p>
            <input type="submit" value="Skicka">
        </p>

    </form>

    <?php

    // phpinfo();
    // print_r($_SERVER);

    ?>

    <!-- Inkludera sidfot -->
    <?php

    include "_includes/footer.php";
    ?>

</body>

</html>