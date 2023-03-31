<?php
    session_start();
    require_once "SystemClass.php";

    SystemClass::blockEntranceSigned("index.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        SystemClass::printHead("./styles/signin.css", "Logowanie")
    ?>
</head>
<body>
    <form action="signIn.php" method="post">
        <h2>Login</h2>
        <input class="input" type="email" name="email" placeholder="E-mail"/>
        <br></br>
        <input class="input" type="password" name="password" id="" placeholder="Password"/>
        <br><br>
        <input type="submit" value="Zaloguj się">

    </form>
    <?php
        if(isset($_SESSION['signInError'])) {
            echo "<div class='error__container'>
                <p style='color : red'>Niepoprawny login lub hasło</p>
            </div>
            ";
        }
    ?>
    
    
</body>
</html>