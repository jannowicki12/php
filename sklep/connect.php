<?php
ob_start();
session_start();
require_once("interfaceClass.php");
require_once("functions.php");
$main = new MainClass();
$user = new user();
$connect = $main -> db_connect();

if ($user -> isAdmin($connect)) {
    $_SESSION['root'] = true;
    header("Location: admin.php");
    exit();
} else if ($user -> isKupiec($connect)) {
    $_SESSION['Kursant'] = true;
    header("Location: koszyk.php");
    exit();
} else if (!($user -> isKursant($connect))) {
    $_SESSION['user'] = true;
    header("Location: koszyk.php");
    exit();
}
?>