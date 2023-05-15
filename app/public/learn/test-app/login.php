<?php

// Se till att sessioner används på sidan
session_start();

require_once "../_includes/database-connection.php";

setup_user($pdo);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php

    require_once "../_includes/header.php";

    ?>

    <h1>Login</h1>
    <form action="" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Login</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get user data from form
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
        // $database = "";
        // echo $form_username . ' - ' . $form_password - ' should be sent to DB.';

        // Send to database
        $sql_statement = "SELECT * FROM `user` WHERE `username` = '$form_username'";

        try {
            $result = $pdo->query($sql_statement);

            var_dump($result);

            $user = $result->fetch();
            // No user found with these credentials
            if (!$user) {
                header("location: ../login.php");
                exit();
            }

            $is_correct_password = password_verify($form_password, $user['password']);
            if (!$is_correct_password) {
                header("location: ../login.php");
                exit();
            }

            // När rätt lösenord är angivet är användaren känd
            // Skapa sessionsvariabler som kan användas
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];


            // If OK redirect to bird page
            header("location: ../bird.php");
        } catch (PDOException $err) {
            echo "There was a problem " . $err->getMessage();
        }
    }

    ?>

</body>

</html>