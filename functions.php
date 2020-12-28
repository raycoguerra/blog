<?php
function conectar(){
	$servername = "localhost";
	$username = "root";
	$password = "12345678";
	$bd = "blog_r";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$bd;charset=utf8", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
}
function validaAdmin(){
	session_start();
	if(!isset($_SESSION["rol"]) || (isset($_SESSION["rol"]) && $_SESSION["rol"]!=0)){
		header('Location: ./index.php?error_permisos=1');
	}else if($_SESSION["rol"]==0){
		return true;
	}
}

function getTimeCanarias(){
	date_default_timezone_set('Europe/London');
	return date("Y-m-d H:i:s");
}
?>