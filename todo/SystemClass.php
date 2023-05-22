<?php

class SystemClass {
    private $host;
    private $user;
    private $pass;
    private $db;
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
    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "todo";
    }

    
    public function dbConnect()
    {
        $connect = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
        return $connect;
    }

}