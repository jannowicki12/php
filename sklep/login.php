<?php
session_start();
require_once ("interfaceClass.php");
$interfaceClass = new InterfaceClass();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <?php
        interfaceClass::printHead("Logowanie", "./assets/css/login/style.css", "./assets/img/login.jpg");
        ?>
    </head>
    <body>
        <form action="loginscript.php" method="post">
            <h2>Login</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Podaj Email"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <button type="submit" name="login">Login<ion-icon name="log-in-outline"></ion-icon></button>
            <div class="noaccount">
                <p>Nie posiadasz konta?<section class="driv"><a href="register.php">Zarejestruj sie<ion-icon name="enter-outline"></ion-icon></a></p></section>
            </div>
        </form>
    </body>
</html>