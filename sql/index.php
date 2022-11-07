<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Logowanie</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>Login</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Nazwa:</label>
            <input type="text" name="uname" placeholder="Nazwa Użytkownika"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <button type="submit">Login</button>
        </form>
    </body>