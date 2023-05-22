<?php
class db {
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "todo";
    }
    public function connectcor()
    {
        $connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        return $connect;
    }
}
