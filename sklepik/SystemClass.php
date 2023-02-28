<?php

class SystemClass {
    private $host;
    private $user;
    private $pass;
    private $db;
    static function printHead($stylesPath, $title) {
        echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$title</title>
        <link rel='stylesheet' href='$stylesPath'";

    }
    public static function printHeros($title1, $description) {
        echo "<section class='hero1'
        <h1>$title1</h1>
        <p>$description</p>
        </section>";
    }
    public function __construct()
		{
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "db_sklep";
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
    public function LoginSystem($connect){

    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
    
        if (empty($email)) {
            header("Location: singInPage.php?error=Nazwa uzytkownika wymagana");
            session_unset();
            exit();
        }else if(empty($password)){
            header("Location: singInPage.php?error=Haslo wymagane");
            exit();
        }else{
            $sql = sprintf(
                "SELECT * FROM users WHERE email='%s' AND password='%s'",
                mysqli_real_escape_string($connect, $email),
                mysqli_real_escape_string($connect, $password)
                );
    
            $result = $connect -> query($sql);
            $sql = sprintf(
                "SELECT * FROM users WHERE email='%s' AND password='%s'",
                mysqli_real_escape_string($connect, $email),
                mysqli_real_escape_string($connect, $password)
                );
    
            $result = $connect -> query($sql);
    
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['signed_in'] = true;	 
                    header("Location: index.php");
                    exit();
                }else{
                    header("Location: singInPage.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
                    session_unset();
                    exit();
                }
            }else{
                header("Location: singInPage.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
                session_unset();
                exit();
            }
        }
        
        }else{
            header("Location: singInPage.php");
            exit();
        }
    }
}