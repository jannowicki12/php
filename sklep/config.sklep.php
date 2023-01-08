<?php
	class MainClass
	{
		
		private $host;
		private $user;
		private $pass;
		private $db;

		public static function printHead($title, $stylesPath, $icon) {
			echo "
			<head>
				<meta charset='UTF-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<link rel='stylesheet' href='$stylesPath'>
				<link rel='icon' href='$icon'>
				<title>$title</title>
				<script type='module' src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
				<script nomodule src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
			</head>";
		}
		public function __construct()
		{
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "db_szkolajazdy";
		}
		function isAdmin($connect)
	{
		$SQL = $connect -> prepare("SELECT `rank` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
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
		public function db_connect()
		{
			$connect = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
			return $connect;
		}
	}
?>