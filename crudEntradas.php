<?php
include "consultas.php";
if(validaAdmin()){
	if(isset($_POST['crud'])){
		if($_POST['crud']=="crear"){
			crearEntrada($_POST);
		}else if($_POST['crud']=="eliminar"){
			borrarEntrada($_POST);
		}
	}
}
?>