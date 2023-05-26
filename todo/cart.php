<?php
require_once "LayoutClass.php";
include "db.php";
$user = $_SESSION['email'];
$users = $_SESSION['username'];

if(!isset($_SESSION['email'])){
    header('Location: signIn.php');
}
if (isset($_POST['delete_cart'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $usuwanie_sql = "DELETE from cart WHERE name = '$name' AND price = '$price' AND user='$users'";
    $connection->query($usuwanie_sql);
    header('Location: cart.php');
}
?>
<html lang="pl">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo</title>
    <link rel="stylesheet" href="assets/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php
        LayoutClass::printHeader();
?>
<div class="bodykoszyka">
    <h2> Cart for <?php echo $user; ?> </h2>
<table class="koszyktab">
    <thead>
    <th>Name</th>
    <th>Price</th>
    <th>Delete</th>
    </thead>
    <tbody>
<?php

$zapytanie = "SELECT name, price FROM cart WHERE user = '$users'";
$wynik = mysqli_query($connection,$zapytanie);
$cena_calkowita = 0;


while($r=mysqli_fetch_row($wynik)) {
    $cena_calkowita = $cena_calkowita + (intval($r[1]));
    echo
    "
    <form action='cart.php' method='post'>
    <tr>
        <td> $r[0] </td>
        <td> $r[1] </td>
        <td> <input type='submit' value='delete' name='delete_cart' class='usunbutt'> </td>
    </tr>   
     <input type='hidden' value='$r[0]' name='name'>
     <input type='hidden' value='$r[1]' name='price'>
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
            <h3> Payments Methods</h3>
            <table>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="paymentcard">  </th>
                    <th><span>Payment Card Visa/Mastercard</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="applepay"></th>
                    <th><span>Apple Pay</span></th>
                </tr>

            </table>
        </div>
        <div class="resztadostawy">
            <span>Username:</span><input type="text" required name="username" value="<?php echo $user;  ?>" disabled> <br>
            <span>Email:</span><input type="text" required name="email" value="<?php echo $users;  ?>" disabled> <br>
        </div>
        <input type="hidden" name="calkowitacena" value="<?php echo $cena_calkowita;?>">
        <input id="formularzdostawy" name="zlozzamowienie" type="submit" value="Submit your order">
    </form>



</div>
<?php
if(isset($_POST['zlozzamowienie'])){
    if($cena_calkowita == 0) {
        echo "<p style='text-align: center; color: red;'>There are no products in the cart</p>";
    }
    else {
        include "MakeOrder.php";
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
        $paymentmethod = mysqli_real_escape_string($connection, $_POST['metodaplatnosc']);
        $cost_order = mysqli_real_escape_string($connection, $_POST['calkowitacena']);
        $makeorder = new MakeOrder($paymentmethod, $username, $email, $cost_order);
        $makeorder->Zamow();
        $usuwaniecart_sql = "DELETE FROM cart WHERE user = '$username'";
        $connection->query($usuwaniecart_sql);
        echo "<p style='text-align: center; color: green;'>placed order</p>";
    }
}

?>

</body>


</html>
