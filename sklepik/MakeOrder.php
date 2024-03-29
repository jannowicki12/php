<?php
Class MakeOrder{
    public $deliverymethod;
    public $paymentmethod;
    public $firstname;
    public $lastname;
    public $email;
    public $phonenumber;
    public $cost_order;
    public $street;
    public $numberstreet;
    public $city;
    public $country;
    public $zipcode;

    /**
     * @param $deliverymethod
     * @param $paymentmethod
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $phonenumber
     * @param $cost_order
     * @param $connection
     */
    public function __construct($deliverymethod, $paymentmethod, $firstname, $lastname, $email, $phonenumber, $cost_order,$street,$numberstreet,$city, $country, $zipcode)
    {
        $this->deliverymethod = $deliverymethod;
        $this->paymentmethod = $paymentmethod;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->cost_order = $cost_order;
        $this->street = $street;
        $this->numberstreet = $numberstreet;
        $this->city = $city;
        $this->country = $country;
        $this->zipcode = $zipcode;
    }

    public function Zamow(): void{
        require "dbconnect.php";
        $status = "Złożono zamówienie";
        $zapytanie = "INSERT INTO orders (deliverymethod, paymentmethod, firstname, lastname, email, phonenumber, cost_order, date_order, street, numberstreet, city, Country, zipcode, Status) VALUES ('$this->deliverymethod', '$this->paymentmethod', '$this->firstname', '$this->lastname','$this->email','$this->phonenumber','$this->cost_order',CURDATE(),'$this->street','$this->numberstreet','$this->city','$this->country','$this->zipcode','$status')";
        $connection->query($zapytanie);
    }


}