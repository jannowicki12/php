<?php
require_once("config.sklep.php");
$main = new MainClass();
$connect = $main->db_connect();

class user
{
	function isAdmin($connect)
	{
		$SQL = $connect -> prepare("SELECT `rank` FROM `users` WHERE `email` = :email");
		$SQL -> execute(array(':email' => $_SESSION['email']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank == 2)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function isKupiec($connect)
	{
		$SQL = $connect -> prepare("SELECT `rank` FROM `users` WHERE `email` = :email");
		$SQL -> execute(array(':email' => $_SESSION['email']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
