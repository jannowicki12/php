<?php

class SystemClass {
    static function printHead($stylesPath, $title) {
        echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$title</title>
        <link rel='stylesheet' href='$stylesPath'";

    }
    public static function printHeros($title1, $description) {
        echo "<section class='hero1'
        <h1>$title1</h1>
        <p>$description</p>
        </section>";
    }
    
}