<?php

class SystemClass {
    static function printHead($stylesPath, $title) {
        echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <script src='js/functions.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <title>$title</title>
        <link rel='stylesheet' href='$stylesPath'";

    }

    public static function dbConnect() {
        require_once "config.php";
        return new mysqli($host, $db_user, $db_password, $db_name);
    }

    public static function blockEntranceNotSigned($move_to) {
        if(!isset($_SESSION['signedIn'])) {
            header("Location: $move_to");
        }
    }

    public static function blockEntranceSigned($move_to) {
        if(isset($_SESSION['signedIn'])) {
            header("Location: $move_to");
        }
    }
}