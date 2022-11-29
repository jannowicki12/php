<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <form action="registration.php" method="post">
            <h2>Register</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Nazwa:</label>
            <input type="text" name="uname" placeholder="Podaj Nazwa Użytkownika"><br>
            <?php if (isset($_GET['erroruser'])) { ?>
                <p class="error"><?php echo $_GET['erroruser']; ?></p>
            <?php } ?>
            <label>Email:</label>
            <input type="text" name="email" placeholder="Podaj email"><br>
            <?php if (isset($_GET['erroremail'])) { ?>
                <p class="error"><?php echo $_GET['erroremail']; ?></p>
            <?php } ?>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <?php if (isset($_GET['errorpass'])) { ?>
                <p class="error"><?php echo $_GET['errorpass']; ?></p>
            <?php } ?>
            <label>Powtórz Hasło:</label>
            <input type="password" name="re-password" placeholder="Powtórz hasło"><br>
            <?php if (isset($_GET['errorrepass'])) { ?>
                <p class="error"><?php echo $_GET['errorrepass']; ?></p>
            <?php } ?>
            <button type="submit">register</button>
        </form>
    </body>
</html>