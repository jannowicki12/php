<?php
require 'dbconnect.php';
$db = new db();
$connect = $db -> connectcor();
include "AdminClass.php";
session_start();
$username = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    header("Location: notadmin.html ");
}
$isadminquery = "SELECT * FROM users WHERE username = '$username'";
$select = mysqli_query($connect, $isadminquery);
while ($res = mysqli_fetch_assoc($select)){
    if($res['rank'] == 0){
        header("Location: notadmin.php");
    }
    if($res['rank'] == 1){
        echo '<!doctype html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="styles/admin.css">
            <script type="text/javascript" src="js/functions.js"></script>
            <title>Panel admin</title>
        </head>
        <body>
            <p>jestes moderatorem</p>
        </body>';
    }
    if($res['rank'] == 2){
        echo '<!doctype html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="styles/admin.css">
            <script type="text/javascript" src="js/functions.js"></script>
            <title>Panel admin</title>
        </head>
        <body>
            <p>jestes adminem</p>
        </body>';
    }
    if($res['rank'] > 2) {
        header("Location: notadmin.php");
    }
}

?>
</html>
