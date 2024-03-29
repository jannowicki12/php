<?php
require_once "LayoutClass.php";
include "db.php";
$user = $_SESSION['email'];
$users = $_SESSION['username'];

if(!isset($_SESSION['email'])){
    header('Location: login.php');
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
    <title>Koszyk</title>
    <link rel="stylesheet" href="assets/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php
        LayoutClass::printHeader();
?>
<div class="bodykoszyka">
    <p style="font-size: 35px;"> Koszyk dla <?php echo $user; ?> </p>
<table class="koszyktab">
    <thead>
    <th>Nazwa</th>
    <th>Cena</th>
    <th>Usun</th>
    <th> </th>
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
        <td> $r[1] PLN</td>
        <td> <input type='submit' value='Usun' name='delete_cart' class='usunbutt'> </td>
    </tr>   
     <input type='hidden' value='$r[0]' name='name'>
     <input type='hidden' value='$r[1]' name='price'>
    </form>
    ";

}
echo "
<tr>
<td colspan='3'> Kwota calkowita </td>
<td> $cena_calkowita PLN</td>
</tr>
</tbody>
</table>
";
?>
</div>
<div class="dostawaform" id="formularzID">
    <h3 style="text-align: center;"> Panel zamowienia </h3>
    <form action="cart.php" method="post">
        <div class="sposobdostawy">
            <p>Metody Platnosci</p>
            <table>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="kartaplatnicza"><span> Karta</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="applepay"><span> Apple Pay</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="paysafecard"><span> Paysafecard</span></th>
                </tr>
                <tr>
                    <th><input type="radio" name="metodaplatnosc" required value="blik"><span> Blik</span></th>
                </tr>

            </table>
        </div>
        <div class="resztadostawy">
            <span>Username:</span><input type="text" name="username" required name="username" value="<?php echo $users;  ?>" disabled> <br>
            <span>Email:</span><input type="text" name="email" required name="email" value="<?php echo $user;  ?>" disabled> <br>
        </div>
        <input type="hidden" name="calkowitacena" value="<?php echo $cena_calkowita;?>">
        <input id="formularzdostawy" name="zlozzamowienie" type="submit" value="Zloz zamowienie">
    </form>



</div>
<?php
if(isset($_POST['zlozzamowienie'])){
    if($cena_calkowita == 0) {
        echo "<div class='alert alert-danger' role='alert'>Brak rzeczy w koszyku</div>";
    }
    else {
        $username = $_SESSION['username'];
        $check_user_exists = "SELECT * FROM orders WHERE username='$username'  LIMIT 1";
        $result = $connection->query($check_user_exists);
        if ($result->num_rows == 1) {
            echo "<div class='alert alert-danger' role='alert'>posiadasz juz konto premium</div>";
        }
        else {
            include "MakeOrder.php";
            $paymentmethod = mysqli_real_escape_string($connection, $_POST['metodaplatnosc']);
            $cost_order = mysqli_real_escape_string($connection, $_POST['calkowitacena']);
            $email = $_SESSION['email'];
            $username = $_SESSION['username'];
            $makeorder = new MakeOrder($paymentmethod, $username, $email, $cost_order);
            $makeorder->Zamow();
            $usuwaniecart_sql = "DELETE FROM cart WHERE user = '$username'";
            $connection->query($usuwaniecart_sql);
            echo "<div class='alert alert-success' role='alert'>zaplacono oraz nadano premium!</div>";
        }
    }
}

?>

</body>


</html>
