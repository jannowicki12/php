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
    $obecnymail = $_SESSION['email'];
    $nowehaslo = $_POST['nowehaslo'];
    $zmianasql = " UPDATE users SET email='$nowymail', password='$nowehaslo' WHERE email='$obecnymail'";
    $zmianacart = "UPDATE cart SET user = '$nowymail' WHERE user='$obecnymail'";
    $zmianaorders = "UPDATE orders SET email = '$nowymail' WHERE email = '$obecnymail'";
    $connection->query($zmianasql);
    $connection->query($zmianacart);
    $connection->query($zmianaorders);
}
if(isset($_POST['usunkonto'])){
    $usun_konto_query = "DELETE FROM users WHERE email='$email'";
    $usun_zamowienia_konta = "DELETE FROM orders WHERE email='$email'";
    $usun_koszyk_konta = "DELETE FROM cart WHERE user='$email'";
    $connection->query($usun_konto_query);
    $connection->query($usun_zamowienia_konta);
    $connection->query($usun_koszyk_konta);
    header("Location: logout.php");
}
?>

<html lang="pl">
<head>
    <?php
        SystemClass::printHead("./styles/profil.css", "Profil")
    ?>
</head>
<body>
<?php
        LayoutClass::printHeader();
?>

<div class="bodyprofilu">
<form action="profil.php" method="post" class="formularzzmiany">
        <label for="nowyemail" class="sr-only">Email:</label>
    <input type="text" class="form-control" id="nowyemail" name="nowyemail" disabled value="<?php echo $profil['email']?>"> <br>
    <label for="nowehaslo" class="sr-only">Password:</label>
    <input type="text" class="form-control" id="nowehaslo" name="nowehaslo" disabled value="<?php echo $profil['password']?>"> <br>
        <button type='button' id="pokazemail" onclick="Zmiendane()" class="zmiendanebutt"> <i class="fi fi-rr-refresh"></i> Change data</button>
    <input id="zmiendanebutton" type="submit" name="zmiendane" value="Update data!" class="dane" disabled>
    <input class="dane" type="submit" name="usunkonto" onclick="return confirm('Do you really want to delete your account? This operation cannot be changed')" class="usunkontobutt" value="Delete Account">
</form>
<?php
$zapytaniezamowienia = "SELECT id_orders, deliverymethod, paymentmethod, firstname, lastname, phonenumber,  cost_order, date_order, street, numberstreet, city, country, zipcode, Status FROM orders WHERE email='$email'";
$zamowienieselect = mysqli_query($connection, $zapytaniezamowienia);
?>
</div>
<div class="historiazamowien">
    <h2> Orders History</h2>
    <table class="tabela">
        <thead>
            <tr>
            <th scope = "col" > ORDER ID </th >
            <th scope = "col" > Payment Method </th >
            <th scope = "col" > Delivery Method </th >
            <th scope = "col" > First Name </th >
            <th scope = "col" > Last Name </th >
            <th scope = "col" > Phone Number </th>
            <th scope = "col" > Order Cost </th >
            <th scope = "col" > Order Date </th >
            <th scope = "col" > Street </th>
            <th scope = "col" > House Number </th>
            <th scope = "col" > City </th>
            <th scope = "col" > Coutry </th>
            <th scope = "col" > Postal Code </th>
            <th scope = "col" > Status </th>
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
            <td > $zamowienie[firstname]</td >
            <td > $zamowienie[lastname]</td >
            <td > $zamowienie[phonenumber]</td >
            <td > $zamowienie[cost_order] PLN</td >
            <td > $zamowienie[date_order]</td >
            <td > $zamowienie[street]</td >
            <td > $zamowienie[numberstreet]</td >
            <td > $zamowienie[city]</td >
            <td > $zamowienie[country]</td >
            <td > $zamowienie[zipcode]</td >
            <td > $zamowienie[Status]</td >
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