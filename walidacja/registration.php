<?php
session_start();
require_once("config.class.php");
$main = new MainClass();
$connection = $main -> db_connect();

$uname = htmlentities($_POST['uname'], ENT_QUOTES, "UTF-8");
$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
$repassword = htmlentities($_POST['re-password'], ENT_QUOTES, "UTF-8");
if(strlen($uname) == 0){
    header("Location: index.php?erroruser=Nie podano nazwy uzytkownika");
}else if(strlen($email) == 0){
    header("Location: index.php?erroremail=Nie podano maila");
}else if(strlen($password) == 0){
    header("Location: index.php?errorpass=Nie podano hasla");
}else if(strlen($repassword) == 0){
    header("Location: index.php?errorrepass=Nie powtórzono hasla");
}else if($password !== $repassword){
    header("Location: index.php?error=Haslo sie nie zgadza");
    exit();
}else if(strlen($password) < 8){
    header("Location: index.php?error=Haslo jest za krótkie, powinno sie skladac z minimum 8 znaków");
}else {

    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: index.php?error=email jest juz zarejestrowany");
        exit();
    } else {
        $query = "INSERT INTO users (user_name, email, password) VALUES ('$uname', '$email', '$password')";
        
        if (!mysqli_query($connection, $query)){
            $error ="<p>Nie mozesz sie zarejestrować? spróbuj ponownie.</p>";
            } else {

            $_SESSION['id'] = mysqli_insert_id($connection);  
            $_SESSION['name'] = $name;
            $_SESSION['signed_in'] = true;
            }
                
            header("Location: logged.php");  
        
            }
        
        }
?>