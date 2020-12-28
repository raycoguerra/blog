<?php
include 'header.php';
if(validaAdmin()){
	if(isset($_GET['nueva']) && $_GET['nueva'] == 1){
		echo '<div class="alert alert-success">
		  <strong>BIEN!</strong> Entrada creada
		</div>';
	}else if(isset($_GET['nueva']) && $_GET['nueva'] == 0){
		echo '<div class="alert alert-danger">
		  <strong>Error!</strong> Ha ocurrido un error creando la entrada
		</div>';
	}
?>

<form action="./crudEntradas.php" method="POST"class="d-flex flex-column align-items-center">
  <div class="form-group">
    <label for="title">Título:</label>
    <input type="text" class="form-control" size="40" name ="titulo" placeholder="Título" id="titulo" required>
  </div>
  <div class="form-group">
    <label for="resumen">Resumen:</label>
    <input type="text" class="form-control" size="80" name="resumen" placeholder="Resumen" id="resumen" required>
  </div>
  <div class="form-group">
  	<label for="resumen">Categoria:</label>
  	<?php
  		obtenerCategorias();
  	?>
  </div>
    <div class="form-group">
  	<label  for="contenido">Contendio</label>
  	<TEXTAREA id="contenido" class="form-control" cols="100" rows="30" name="contenido" required>
  		
  	</TEXTAREA>
  </div>
  <button type="submit" name="crud" value="crear" class="btn btn-primary">Crea entrada</button>
</form>
<?php
}

include 'footer.php';
?>
