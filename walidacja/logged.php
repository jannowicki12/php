<?php
session_start();
require_once("config.class.php");
$main = new MainClass();
$session = $main -> d_session();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>strona główna</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <p>Pozdro</p>
    </body>
</html>