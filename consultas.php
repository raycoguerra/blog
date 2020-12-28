<?php
include "functions.php";

function obtenerUsuario($user, $pass){
	try{
		$conn = conectar();
		$consulta = "SELECT * FROM user where user =:user and pass=:pass";
		$stmt = $conn->prepare($consulta);
		$stmt->bindParam(":user", $user);
		$stmt->bindParam(":pass", $pass);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$conn = null;
		return $stmt->fetchAll()[0];
	} catch(PDOException $e) {
 		 echo "Error: " . $e->getMessage();
 	}
}

function obtenerCategorias(){
	$conn = conectar();
	$consulta = 
	$stmt = $conn->prepare("Select * from categoria");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$categorias = $stmt->fetchAll();
	$conn = null;
	//return $stmt->fetchAll();
	echo '<select id="categoria" name="categoria" required>';
	 echo "<option value=''>".$category["nombre"]."</option>";
	foreach($categorias as $category) {
	    echo "<option value='".$category['idcategoria']."'>".$category["nombre"]."</option>";
	}
	echo '</select>';
}

function obtenerEntradasSelect(){
	$conn = conectar();
	$stmt = $conn->prepare("Select * from post");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$entradas = $stmt->fetchAll();
	$conn = null;
	//return $stmt->fetchAll();
	echo '<select id="entrada" name="entrada" required>';
	foreach($entradas as $entrada) {
	    echo "<option value='".$entrada['idpost']."'>".$entrada["titulo"]."</option>";
	}
	echo '</select>';
}

function crearEntrada($datos){
	try{
		$conn = conectar();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$fecha = getTimeCanarias();
		$sql = "INSERT INTO post(titulo, resumen, contenido, idcat, fecha) VALUES ('".$datos['titulo']."', '".$datos['resumen']."', '".$datos['contenido']."', ".$datos['categoria'].",'".$fecha."')";
		$conn->exec($sql);
		header('Location: ./crearEntrada.php?nueva=1');
	} catch(PDOException $e) {
 		 echo "Error: " . $e->getMessage();
 		 header('Location: ./crearEntrada.php?nueva=0');
 	}
}

function borrarEntrada($datos){
	try{
		$conn = conectar();
		$sql = "DELETE FROM post WHERE idpost=".$datos['entrada'];
		$conn->exec($sql);
		header('Location: ./eliminarEntrada.php?eliminar=1');
	} catch(PDOException $e) {
 		 echo "Error: " . $e->getMessage();
 		 header('Location: ./eliminarEntrada.php?eliminar=0');
 	}
}

function obtenerEntradas(){
	$conn = conectar();
	$stmt = $conn->prepare("Select * from post");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$entradas = $stmt->fetchAll();
	$conn = null;
	return $entradas;
}

function obtenerPostCategoria($id){
	$conn = conectar();
	$stmt = $conn->prepare("Select * from post where idcat=".$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$entradas = $stmt->fetchAll();
	$conn = null;
	return $entradas;
}
?>
