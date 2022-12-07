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
            <label>Nazwa:</label>
            <input type="text" name="uname" placeholder="Nazwa Użytkownika"><br>
            <label>Hasło:</label>
            <input type="password" name="password" placeholder="Hasło"><br>
            <button type="submit">Login<ion-icon name="log-in-outline"></ion-icon></button>
            <div class="noaccount">
                <p>Nie posiadasz konta?<section class="driv"><a href="register.php">Zarejestruj sie<ion-icon name="enter-outline"></ion-icon></a></p></section>
            </div>
        </form>
    </body>
    <?php
    interfaceClass::interfaceFooter();
    ?>
</html>