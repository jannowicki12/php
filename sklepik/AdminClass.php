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
        $query = "SELECT * FROM `users` WHERE 1";
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
                            <th scope = 'col' > Admin </th>
                            <th scope = 'col' > Edit </th>
                            <th scope = 'col' > Delete Account </th >
                        </tr>
                        </thead>
                        <tbody>
                ";
            while ($r=mysqli_fetch_assoc($select)){
                echo "
            <tr>
            <form id='editusers' action='AdminPanel.php?panel=users' method='post' enctype='multipart/form-data'> 
                <td><input type='text' class='form-control' id='editmail' name='editmail' value='$r[email]'></td>
                <td><input type='text' class='form-control' id='edithaslo' name='edithaslo' value='$r[password]'></td>
                <td><input type='text' class='form-control' id='editadmin' name='editadmin' value='$r[isadmin]'></td>
                <td><form action='AdminPanel.php?panel=users' method='post'> <input type='hidden' name='idusers' value='$r[id]'><input id='zmieneditbutton' type='submit' name='editusers' value='Edit!' class='zaaktualizujdanebutt'></form></td>
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
                        <th scope = 'col' > Edit </th>
                        <th scope = 'col' > Delete Product </th >
                        </tr>
                    </thead>
                    <tbody>
            ";
        while ($row=mysqli_fetch_assoc($select1)){
            echo "
        <tr>
        <form id='editproducts' action='AdminPanel.php?panel=listproduct' method='post' enctype='multipart/form-data'> 
            <td>$row[id]</td>
            <td><input type='text' class='form-control' id='editname' name='editname' value='$row[name]'></td>
            <td>$row[img]</td>
            <td><input type='number' class='form-control' id='editprice' name='editprice' value='$row[price]' ></td>
            <td><form action='AdminPanel.php?panel=listproduct' method='post'> <textarea maxlength='1000' id='editdesc' name='editdesc' rows='3' cols='50'>$row[desc] </textarea></td>
            <td><input type='number' class='form-control' id='editcount' name='editcount' value='$row[count]' ></td>
            <td><form action='AdminPanel.php?panel=listproduct' method='post'><input type='hidden' name='idprodukt' value='$row[id]'><input id='zmieneditproduktubutton' type='submit' name='editprodukt' value='Edit!' class='zaaktualizujdaneproduktubutt'></form></td>
            <td><form action='AdminPanel.php?panel=listproduct' method='post'><input type='hidden' name='idprodukt' value='$row[id]'><input name='delprodukt'type='submit' value='delete'></form></td>
        </tr>
            ";
        // <td><input type='hidden' name='idproduktu' value='$row[id]'><input type='submit' name='editprodukt' value='Edit!'></form></td>
        } echo "</tbody> </table> </div>";

        }
    }
    public function listazamowien():void{
        include "dbconnect.php";
        $query2 = "SELECT * FROM `orders`";
        $select2 = mysqli_query($connection, $query2);
        if(mysqli_num_rows($select2)<=0){
            echo "There are no orders";
        }else{
            echo"<div class='tabelka'> 
            <table>
            <thead>
                        <tr>
                        <th scope = 'col' > ORDER ID </th >
                        <th scope = 'col' > Payment Method </th >
                        <th scope = 'col' > Delivery Method </th >
                        <th scope = 'col' > First Name </th >
                        <th scope = 'col' > Last Name </th >
                        <th scope = 'col' > Email </th >
                        <th scope = 'col' > Phone Number </th>
                        <th scope = 'col' > Order Cost </th >
                        <th scope = 'col' > Order Date </th >
                        <th scope = 'col' > Street </th>
                        <th scope = 'col' > House Number </th>
                        <th scope = 'col' > City </th>
                        <th scope = 'col' > Country </th>
                        <th scope = 'col' > Postal Code </th>
                        <th scope = 'col' > Status </th>
                        <th scope = 'col' > Edit </th>
                        </tr>
                    </thead>
                    <tbody>
            ";
        while ($rows=mysqli_fetch_assoc($select2)){
            echo "
        <tr>
        <form id='editorders' action='AdminPanel.php?panel=listorders' method='post' enctype='multipart/form-data'> 
            <td>$rows[id_orders]</td>
            <td>$rows[paymentmethod]</td>
            <td>$rows[deliverymethod]</td>
            <td><input type='text' class='form-control' id='editfirstname' name='editfirstname' value='$rows[firstname]'></td>
            <td><input type='text' class='form-control' id='editlastname' name='editlastname' value='$rows[lastname]'></td>
            <td>$rows[email]</td>
            <td><input type='text' class='form-control' id='editphonenumber' name='editphonenumber' value='$rows[phonenumber]'></td>
            <td>$rows[cost_order]</td>
            <td>$rows[date_order]</td>
            <td><input type='text' class='form-control' id='editstreet' name='editstreet' value='$rows[street]'></td>
            <td><input type='text' class='form-control' id='edithousenumber' name='edithousenumber' value='$rows[numberstreet]'></td>
            <td><input type='text' class='form-control' id='editcity' name='editcity' value='$rows[city]'></td>
            <td><input type='text' class='form-control' id='editcountry' name='editcountry' value='$rows[Country]'></td>
            <td><input type='text' class='form-control' id='editpostalcode' name='editpostalcode' value='$rows[zipcode]'></td>
            <td><select name='editstatus' id='editstatus'><option value='zlozono'>$rows[Status]</option><option value='Potwierdzono zamowienie'>Potwierdzono zamowienie</option><option value='W trakcie pakowania'>W trakcie pakowania</option><option value='Wyslane'>Wyslane</option><option value='Dostarczono'>Dostarczono</option></td>
            <td><form action='AdminPanel.php?panel=listorders' method='post'><input type='hidden' name='idorders' value='$rows[id_orders]'><input id='editbutton' type='submit' name='editorders' value='Edit!' class='zaaktualizujdanebutt'></form></td>
        </tr>
            ";
            // <td><input type='text' class='form-control' id='editstatus' name='editstatus' value='$r[status]'></td>
        } echo "</tbody> </table> </div>";
        }
    } 
}