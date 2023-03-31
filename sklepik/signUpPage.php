<?php
    session_start();
    require_once "SystemClass.php";
    SystemClass::blockEntranceSigned("index.php");
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <?php
        SystemClass::printHead("./styles/signup.css", "Rejestracja");
        ?>
    </head>
    <body>
        <form action="signup.php" method="post">
            <h2>Register</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Podaj email"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <label>Powtórz Hasło:</label>
            <input type="password" name="re-password" placeholder="Powtórz hasło"><br>
            <button type="submit">register</button>
        </form>
    </body>