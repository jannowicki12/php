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
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter email"><br>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Password"><br>
            <label>Repeat Password:</label>
            <input type="password" name="re-password" placeholder="Enter Repeat Password"><br>
            <button type="submit">Register</button>
        </form>
        <?php
        if(isset($_SESSION['signUpEmailError'])) {
            echo "<div class='error__container'>
                <p style='color : red'>This email is already registered</p>
            </div>
            ";
        } 
        if(isset($_SESSION['signUpPasswordrequired'])) {
            echo "<div class='error__container'>
                <p style='color : red'>Password is required</p>
            </div>
            ";
        } 
        if(isset($_SESSION['signUpEmailrequired'])) {
            echo "<div class='error__container'>
                <p style='color : red'>Email is required</p>
            </div>
            ";
        } 
        if(isset($_SESSION['signUpPasswordError'])) {
            echo "<div class='error__container'>
                <p style='color : red'>The password doesn't match</p>
            </div>
            ";
        } 
        if(isset($_SESSION['singUpPasswordShort'])) {
            echo "<div class='error__container'>
                <p style='color : red'>The password is too short, it should be at least 8 characters long</p>
            </div>
            ";
        } 
        if(isset($_SESSION['signUpCreateError'])) {
            echo "<div class='error__container'>
                <p style='color : red'>Can't register? try again</p>
            </div>
            ";
        } 
        ?>
    </body>