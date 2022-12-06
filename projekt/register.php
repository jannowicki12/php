<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="assets/css/login/style.css">
    </head>
    <body>
        <form action="registration.php" method="post">
            <h2>Register</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Nazwa:</label>
            <input type="text" name="uname" placeholder="Podaj Nazwa Użytkownika"><br>
            <label>Email:</label>
            <input type="text" name="email" placeholder="Podaj email"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <label>Powtórz Hasło:</label>
            <input type="password" name="re-password" placeholder="Powtórz hasło"><br>
            <button type="submit">register</button>
        </form>
    </body>