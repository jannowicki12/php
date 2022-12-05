<?php
	class MainClass
	{
		
		private $host;
		private $user;
		private $pass;
		private $db;

		public static function printHead($stylesPath) {
			echo "
			<head>
				<meta charset='UTF-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<link rel='stylesheet' href='$stylesPath'>
				<title>xxxxxxxxxxx</title>
			</head>";
		}
		public function __construct()
		{
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "db_formularz";
		}
		public function db_connect()
		{
			$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
			return $connect;
		}
	}
?>