<?php
require_once "LayoutClass.php";
require_once "SystemClass.php";
if(!isset($_SESSION['email'])){
    header("Location: signIn.php");
}
require "dbconnect.php";
$email = $_SESSION['email'];
$wybieranieuserasql = "SELECT id,email,isadmin, password from users WHERE email= '$email'";
$wynik = mysqli_query($connection, $wybieranieuserasql);
$profil = mysqli_fetch_assoc($wynik);

if(isset($_POST['zmiendane'])){
    $nowymail = $_POST['nowyemail'];
    $nowehaslo = $_POST['nowehaslo'];
    $obecnymail = $_SESSION['email'];

    $zmianasql = " UPDATE users SET email='$nowymail', password='$nowehaslo' WHERE email='$obecnymail'";
    $zmianacart = "UPDATE cart SET user = '$nowymail' WHERE user='$obecnymail'";
    $zmianaorders = "UPDATE orders SET email = '$nowymail' WHERE email = '$obecnymail'";
    $connection->query($zmianasql);
    $connection->query($zmianacart);
    $connection->query($zmianaorders);
    header("Location: signIn.php");

}
if(isset($_POST['usunkonto'])){
    $usun_konto_query = "DELETE FROM users WHERE email='$email'";
    $connection->query($usun_konto_query);
    header("Location: logout.php");
}

?>

<html lang="pl">
<head>
    <?php
        SystemClass::printHead("./styles/cart.css", "Profil")
    ?>
</head>
<body>
<?php
        LayoutClass::printHeader();
?>

<div class="bodyprofilu">
<form action="profil.php" method="post" class="formularzzmiany">
        <label for="nowyemail" class="sr-only">E-mail:</label>
    <input type="text" class="form-control" id="nowyemail" name="nowyemail" disabled value="<?php echo $profil['email']?>"> <br>
    <label for="nowehaslo" class="sr-only">Haslo:</label>
        <input type="text" class="form-control" id="nowehaslo" name="nowehaslo" disabled value="<?php echo $profil['password']?>"> <br>
        <button type='button' onclick="Zmiendane()" class="zmiendanebutt"> <i class="fi fi-rr-refresh"></i> Zmień dane</button>
    <input id="zmiendanebutton" type="submit" name="zmiendane" value="Zaaktualizuj dane!" class="zaaktualizujdanebutt" disabled>
    <input type="submit" name="usunkonto" onclick="return confirm('Czy napewno chcesz usunąć konto? Tej operacji nie można cofnąć')" class="usunkontobutt" value="USUŃ KONTO">

</form>
<?php
$zapytaniezamowienia = "SELECT id_orders, deliverymethod, paymentmethod, cost_order, date_order FROM orders WHERE email='$email'";
$zamowienieselect = mysqli_query($connection, $zapytaniezamowienia);
?>
</div>
<div class="historiazamowien">
    <h2> Historia zamówień</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope = "col" > ID ZAMÓWIENIA </th >
            <th scope = "col" > Metoda Płatności </th >
            <th scope = "col" > Sposób dostawy </th >
            <th scope = "col" > koszt zamówienia </th >
            <th scope = "col" > Data zamówienia </th >
        </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($zamowienieselect)>0){
            while($zamowienie = mysqli_fetch_assoc($zamowienieselect)) {
                echo"
                <tr>
            <th scope = 'row' >$zamowienie[id_orders] </th >
            <td > $zamowienie[deliverymethod]</td >
            <td > $zamowienie[paymentmethod]</td >
            <td > $zamowienie[cost_order] PLN</td >
            <td > $zamowienie[date_order]</td >
        </tr >
        ";
                }
}
?>
        </tbody>
    </table>
</div>

</body>

</html>