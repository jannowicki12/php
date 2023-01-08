<?php
session_start();
require_once ("interfaceClass.php");
$interfaceClass = new InterfaceClass();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <?php
        interfaceClass::printHead("Rejestracja", "./assets/css/login/style.css", "./assets/img/login.jpg");
        ?>
    </head>
    <body>
        <form action="registerscript.php" method="post">
            <h2>Register</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Imie:</label>
            <input type="text" name="imie" placeholder="Podaj imie"><br>
            <label>Nazwisko:</label>
            <input type="text" name="nazwisko" placeholder="Podaj Nazwisko"><br>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Podaj email"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <label>Powtórz Hasło:</label>
            <input type="password" name="re-password" placeholder="Powtórz hasło"><br>
            <button type="submit">register</button>
        </form>
    </body>