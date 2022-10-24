<?php
	$connect = mysqli_connect("localhost", "root", "", "db_formularz");
 
	if(!$connect){
		die("Error: Baza danych nie kontaktuje!");
	}
?>