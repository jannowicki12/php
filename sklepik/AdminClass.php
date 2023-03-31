<?php

class AdminClass{


    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function wyswietluserow():void{
        include "dbconnect.php";
        $query = "SELECT id, email, password, isadmin FROM users WHERE email != '$this->user'";
        $select = mysqli_query($connection, $query);
        if(mysqli_num_rows($select)<=0){
            echo "Poza tobą nie ma żadnego innego użytkownika";
        }else{
            echo"<div class='tabela'> 
                <table>
                <thead>
                            <tr>
                            <th scope = 'col' > email </th >
                            <th scope = 'col' > password </th>
                            <th scope = 'col' > Usuń konto </th >
                        </tr>
                        </thead>
                        <tbody>
                ";
            while ($r=mysqli_fetch_assoc($select)){
                echo "
            <tr>
                <td>$r[email]</td>
                <td>$r[password]</td>
                <td><form action='AdminPanel.php?panel=uzytkownicy' method='post'> <input type='hidden' name='iduser' value='$r[id]'>  <input name='deluser'type='submit' value='usun'> </form></td>
            </tr>
        ";
            } echo "</tbody> </table> </div>";
        }
    }
    public function dodajprodukt():void{
        include "dbconnect.php";
        echo "
        <form id='dodajprodukt' action='AdminPanel.php?panel=dodajprodukt' method='post' enctype='multipart/form-data'> 
        Nazwa produktu: <input type='text' name='nazwa'> <br>
        Cena: <input type='number' name='cena'> <br>
        Opis: <textarea maxlength='500' name='desc' rows='5' cols='50' form='dodajprodukt'> </textarea> <br>
        Ilosc w magazynie: <input type='number' name='ilosc'> <br>
        Zdjecie: <input type='file' name='zdj' accept='image/png, image/jpeg, image/jpg'>  <br>
        <input type='submit' name='dodajprodukt' value='Dodaj produkt!'> 
        </form>
        ";
    }

}