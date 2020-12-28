<?php
include 'header.php';
if(validaAdmin()){
	if(isset($_GET['eliminar']) && $_GET['eliminar'] == 1){
		echo '<div class="alert alert-success">
		  <strong>BIEN!</strong> Entrada eliminada
		</div>';
	}else if(isset($_GET['eliminar']) && $_GET['eliminar'] == 0){
		echo '<div class="alert alert-danger">
		  <strong>Error!</strong> Ha ocurrido un error eliminando la entrada
		</div>';
	}
?>

<form action="./crudEntradas.php" method="POST"class="d-flex flex-column align-items-center">
  	<?php
  		obtenerEntradasSelect();
  	?>
  <button type="submit" name="crud" value="eliminar" class="btn btn-primary">Eliminar</button>
</form>
<?php
}

include 'footer.php';
?>
