<?php
require_once "../_includes/database-connection.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form action="" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Register</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get user data from form
        $form_username = $_POST['username'];
        $form_hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        echo $form_username . ' - ' . $form_password - ' should be sent to DB.';

        // Send to database
        $sql_statement = "INSERT INTO `$database`.`User` (`username`, `password`) VALUES ('$form_username', '$form_hashed_password')";

        try {
            $result = $pdo->query($sql_statement);

            var_dump($result);

            // If OK redirect to login page
            header("location: login.php");
        } catch (PDOException $err) {
            echo "There was a problem " - $err->getMessage();
        }
    }

    ?>
</body>

</html>