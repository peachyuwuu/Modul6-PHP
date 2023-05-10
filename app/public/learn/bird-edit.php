<?php

declare(strict_types=1);

include "_includes/global-functions.php";

include "_includes/database-connection.php";

$title = "Fågelskådning - redigera namn";

// Förbered variabler som används i formuläret
$bird_name = "";

$row = null;

// Hantera POST request
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    print_r2("Metoden post används");

    // Global array $_POST innehåller olika fält som finns i formuläret
    print_r2($_POST);

    $bird_name = trim($_POST['bird_name']);
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    // Kontrollera att minst två tecken finns i fältet för bird_name
    if (strlen($bird_name) >= 2) {

        // Spara till databasen
        $sql = "UPDATE `bird` SET `bird_name` = '$bird_name' WHERE `bird`.`id` = $id";

        print_r2($sql);

        // Använd databaskopplingen för att spara till tabellen i databasen
        $result = $pdo->exec($sql);

        // Om posten uppdaterats visa sidan bird.php
        if ($result) {
            header('Location: bird.php');
            exit;
        }
    }
}

// För att redigera en fågel används en GET request där id framgår, ex id=2
if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    // Visa eventuella fåglar som finns i tabellen
    $sql = "SELECT * FROM bird WHERE id=$id";

    // Använd databaskopplingen för att hämta datan
    $result = $pdo->prepare($sql);
    $result->execute();

    // Om det finns ett resultat från databasanropet sparas det i variabeln $row
    $row = $result->fetch();

    // Kontrollera att det finns en post som gav resultat
    if ($row) {
        print_r2($row);
        $bird_name = $row['bird_name'];
    }
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

    <?php

    include "_includes/header.php";

    ?>

    <h1><?= $title ?></h1>

    <!-- Visa formulär om det finns ett fågelnamn som ska redigeras -->

    <?php

    if ($row) {

    ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <p>
                <label for="bird_name">Fågel:</label>
                <input type="text" name="bird_name" id="bird_name" value="<?= $bird_name ?>" required minlength="2" maxlength="25">
                <!-- Skicka med fågelns id som finns sparad i databasen - använd ett dolt input fält -->
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
            </p>
            <p>
                <input type="submit" value="Uppdatera">
                <input type="reset" value="Nollställ">
            </p>

        </form>

    <?php

    }

    ?>

    <?php

    include "_includes/footer.php";

    ?>

</body>

</html>