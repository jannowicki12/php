<?php
	class MainClass
	{
		
		private $host;
		private $user;
		private $pass;
		private $db;

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
		public function d_session()
		{
			
			if(!isset($_SESSION["signed_in"])) {
				header("Location: index.php");
			}
		}
	}
?>