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
			$this->db = "db_editprojekt";
		}
		public function db_connect()
		{
			$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
			return $connect;
		}
	}
?>