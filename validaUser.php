<?php
include "consultas.php";
if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = obtenerUsuario($_POST['user'], $_POST['pass']);
	if($user == null){
		header('Location: ./login.php?error_login=1');
	}else if($user['rol'] == 0){
		session_unset();
		session_destroy();
		session_set_cookie_params(60);
		session_start();
		$_SESSION["rol"]= 0;
		$_SESSION["name"]= $user['user'];
		header('Location: ./index.php');
	}
}

?>