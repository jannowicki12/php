<?php

class KoszykClass{


    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function success():void{
        echo "<div class='powiadomienie' id='mess' onclick='this.remove();'> <a href='cart.php' style='color: green; margin-left:950px;'>order placed</a></div>";
    }
}