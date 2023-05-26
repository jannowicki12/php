<?php
Class MakeOrder{
    public $paymentmethod;
    public $username;
    public $email;
    public $cost_order;

    /**
     * @param $paymentmethod
     * @param $username
     * @param $email
     * @param $cost_order
     * @param $connection
     */
    public function __construct($paymentmethod, $username, $email, $cost_order)
    {
        $this->paymentmethod = $paymentmethod;
        $this->username = $username;
        $this->email = $email;
        $this->cost_order = $cost_order;
    }

    public function Zamow(): void{
        include "db.php";
        $rank = "1";
        $zapytanie = "INSERT INTO orders (paymentmethod, username, email, cost_order, date_order) VALUES ('$this->paymentmethod', '$this->username','$this->email', '$this->cost_order',CURDATE())";
        $connection->query($zapytanie);
        $nadanierangi = "UPDATE `users` SET `rank`='$rank' WHERE username = '$this->username'";
        $connection->query($nadanierangi);
    }


}