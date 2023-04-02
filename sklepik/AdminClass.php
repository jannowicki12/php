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
            echo "There is no other user besides you";
        }else{
            echo"<div class='tabela'> 
                <table>
                <thead>
                            <tr>
                            <th scope = 'col' > Email </th >
                            <th scope = 'col' > Password </th>
                            <th scope = 'col' > Delete Account </th >
                        </tr>
                        </thead>
                        <tbody>
                ";
            while ($r=mysqli_fetch_assoc($select)){
                echo "
            <tr>
                <td>$r[email]</td>
                <td>$r[password]</td>
                <td><form action='AdminPanel.php?panel=users' method='post'> <input type='hidden' name='iduser' value='$r[id]'>  <input name='deluser'type='submit' value='delete'> </form></td>
            </tr>
        ";
            } echo "</tbody> </table> </div>";
        }
    }
    public function dodajprodukt():void{
        include "dbconnect.php";
        echo "
        <form id='dodajprodukt' action='AdminPanel.php?panel=dodajprodukt' method='post' enctype='multipart/form-data'> 
        Name Product: <input type='text' name='nazwa'> <br>
        Price: <input type='number' name='cena'> <br>
        Description: <textarea maxlength='500' name='opis' rows='5' cols='50' form='dodajprodukt'> </textarea> <br>
        Quantity in stock: <input type='number' name='ilosc'> <br>
        Image: <input type='file' name='zdj' accept='image/png, image/jpeg, image/jpg'>  <br>
        <input type='submit' name='dodajprodukt' value='Add Product!'> 
        </form>
        ";
    }
    public function listaproduktow():void{
        include "dbconnect.php";
        $query1 = "SELECT * FROM `product`";
        $select1 = mysqli_query($connection, $query1);
        if(mysqli_num_rows($select1)<=0){
            echo "There are no products in the store";
        }else{
            echo"<div class='tabela'> 
            <table>
            <thead>
                        <tr>
                        <th scope = 'col' > Id </th >
                        <th scope = 'col' > Name </th>
                        <th scope = 'col' > Image </th>
                        <th scope = 'col' > Price </th>
                        <th scope = 'col' > Description </th>
                        <th scope = 'col' > Count </th>
                        <th scope = 'col' > Delete Product </th >
                        </tr>
                    </thead>
                    <tbody>
            ";
        while ($row=mysqli_fetch_assoc($select1)){
            $product_id = $row['id'];
            echo "
        <tr>
            <td>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[img]</td>
            <td>$row[price]</td>
            <td>$row[desc]</td>
            <td>$row[count]</td>
            <td><form action='AdminPanel.php?panel=listproduct' method='post'> <input type='hidden' name='idprodukt' value='$row[id]'>  <input name='delprodukt'type='submit' value='delete'> </form></td>
        </tr>
            ";
        } echo "</tbody> </table> </div>";

        }
    }
}