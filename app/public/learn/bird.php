<?php

declare(strict_types=1);

session_start();

include "_includes/global-functions.php";

include "_includes/database-connection.php";

// Setup table bird
setup_bird($pdo);

$title = "Fågelskådning";

// Förbered variabler som används i formuläret
$bird_name = "";

// Hantera POST request
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    print_r2("Metoden post används");

    // Global array $_POST innehåller olika fält som finns i formuläret
    print_r2($_POST);

    $bird_name = trim($_POST['bird_name']);

    // Kontrollera att minst två tecken finns i fältet för bird_name
    if (strlen($bird_name) >= 2) {

        // Spara till databasen
        $sql = "INSERT INTO bird (bird_name) VALUES ('$bird_name')";

        print_r2($sql);

        // Använd databaskopplingen för att spara till tabellen i databasen
        $result = $pdo->exec($sql);
    }
}

// Visa eventuella fåglar som finns i tabellen
$sql = "SELECT * FROM bird";

// Använd databaskopplingen för att hämta datan
$result = $pdo->prepare($sql);
$result->execute();
$rows = $result->fetchAll();


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

    <!-- Om användaren inte är inloggad ska inte formuläret visas -->

    <?php

    if (isset($_SESSION['user_id'])) {



    ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <p>
                <label for="bird_name">Fågel:</label>
                <input type="text" name="bird_name" id="bird_name" required minlength="2" maxlength="25">

                <!-- För att koppla en användare till tabellen används ett dolt fält med användarens id -->
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
            </p>
            <p>
                <input type="submit" value="Spara">
                <input type="reset" value="Nollställ">
            </p>

        </form>

    <?php

    }

    ?>

    <section>
        <?php

        foreach ($rows as $row) {
            $id = $row['id'];
            echo "<div>";
            // echo "<a href=\"bird-edit.php?id=$id\">";
            if (isset($_SESSION['user_id'])) {
                echo '<a href="bird-edit.php?id=' . $row['id'] . '">';
            }

            echo $row['bird_name'];
            if (isset($_SESSION['user_id'])) {
                echo "</a>";
            }

            echo "</div>";
        }

        ?>
    </section>

    <?php

    include "_includes/footer.php";

    ?>

</body>

</html>