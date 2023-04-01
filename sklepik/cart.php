<?php
require_once "LayoutClass.php";
require_once "SystemClass.php";
require "dbconnect.php";
if(!isset($_SESSION['email'])){
    header('Location: signIn.php');
}
$user = $_SESSION['email'];

if (isset($_POST['delete_cart'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $usuwanie_sql = "DELETE from cart WHERE name = '$name' AND price = '$price' AND count = '$count' AND user='$user'";
    $connection->query($usuwanie_sql);
    header('Location: cart.php');
}
if(isset($_POST['update_cart_count'])){
    $count = $_POST['count_in_cart'];
    $name = $_POST['name'];
    mysqli_query($connection, "UPDATE cart SET count = $count WHERE name = '$name' AND user = '$user'");
    header('Location: cart.php');
}
?>
<html lang="pl">
<head>
    <?php
        SystemClass::printHead("./styles/cart.css", "Sklep Internetowy")
    ?>
</head>
<body>
<?php
        LayoutClass::printHeader();
?>
<div class="bodykoszyka">
    <h2> Cart for <?php echo $user; ?> </h2>
<table class="koszyktab">
    <thead>
    <th>name</th>
    <th>price</th>
    <th>count</th>
    <th>edit</th>
    <th>delete</th>
    </thead>
    <tbody>
<?php

$zapytanie = "SELECT name, price, count FROM cart WHERE user = '$user'";
$wynik = mysqli_query($connection,$zapytanie);
$cena_calkowita = 0;


while($r=mysqli_fetch_row($wynik)) {
    $cena_calkowita = $cena_calkowita + (intval($r[1])*intval($r[2]));
    echo
    "
    <form action='cart.php' method='post'>
    <tr>
        <td> $r[0] </td>
        <td> $r[1] </td>
        <td> $r[2] </td>
        <td> 
        <input style='width: 40px'type='number' min='1' max='99' name='count_in_cart' value='$r[2]'>
        <input type='submit' value='edit' name='update_cart_count' class='editbutt'>
        </td>
        <td> <input type='submit' value='delete' name='delete_cart' class='usunbutt'> </td>
    </tr>   
     <input type='hidden' value='$r[0]' name='name'>
     <input type='hidden' value='$r[1]' name='price'>
     <input type='hidden' value='$r[2]' name='count'>
    </form>
    ";

}
echo "
<tr>
<td colspan='3'> Total Price </td>
<td> $cena_calkowita PLN</td>
</tr>
</tbody>
</table>
";
?>
</div>
<div class="dostawaform" id="formularzID">
    <h2> Delivery Form </h2>
    <form action="cart.php" method="post">
        <div class="sposobdostawy">
            <h3> Delivery Methods</h3>
            <table>
                <tr>
                   <th><input type="radio" name="sposobdostawy" required value="paczkomat">  </th>
                   <th><span>Paczkomat</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="sposobdostawy" required value="kurier"></th>
                    <th><span>Kurier</span></th>
                </tr>

            </table>
        </div>
        <div class="sposobdostawy">
            <h3> Payments Methods</h3>
            <table>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="karta">  </th>
                    <th><span>Karta Visa/Mastercard</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="applepay"></th>
                    <th><span>Apple Pay</span></th>
                </tr>

            </table>
        </div>
        <div class="resztadostawy">
            <span>First Name:</span><input type="text" required name="imie">  <br>
            <span>Last Name:</span><input type="text" required name="nazwisko"> <br>
            <span>Email:</span><input type="text" required name="email" value="<?php echo $user;  ?>" disabled> <br>
            <span>Phone number:</span> <input type="text" required name="telefon"> <br>
        </div>
        <div class="resztadostawy">
            <span>Street:</span><input type="text" required name="ulica">  <br>
            <span>House number:</span><input type="text" required name="nrdomu"> <br>
            <span>City:</span><input type="text" required name="miasto"> <br>
            <span>Zip-code:</span> <input type="text" required name="kodpocztowy"> <br>
        </div>
        <input type="hidden" name="calkowitacena" value="<?php echo $cena_calkowita;?>">
        <input id="formularzdostawy" name="zlozzamowienie" type="submit" value="Submit your order">
    </form>



</div>
<?php

if(mysqli_num_rows($wynik) <= 0){
    echo  "<script> ZablokujFormularzDostawy(); </script>";
}
if(isset($_POST['zlozzamowienie'])){
    include "MakeOrder.php";
    $email = $user;
    $deliverymethod = mysqli_real_escape_string($connection,$_POST['sposobdostawy']);
    $paymentmethod = mysqli_real_escape_string($connection, $_POST['metodaplatnosc']);
    $firstname = mysqli_real_escape_string($connection, $_POST['imie']);
    $lastname = mysqli_real_escape_string($connection,$_POST['nazwisko']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['telefon']);
    $cost_order = mysqli_real_escape_string($connection, $_POST['calkowitacena']);
    $street = mysqli_real_escape_string($connection, $_POST['ulica']);
    $numberstreet = mysqli_real_escape_string($connection, $_POST['nrdomu']);
    $city = mysqli_real_escape_string($connection, $_POST['miasto']);
    $zipcode = mysqli_real_escape_string($connection, $_POST['kodpocztowy']);
    $makeorder = new MakeOrder($deliverymethod, $paymentmethod, $firstname, $lastname, $email, $phonenumber, $cost_order,$street,$numberstreet,$city,$zipcode);
    $makeorder->Zamow();


}



?>

</body>


</html>
