<?php
include 'header.php';

$posts;
if(isset($_GET["categoria"])){
	$posts = obtenerPostCategoria($_GET["categoria"]);
}else{
	$posts = obtenerEntradas();
}

echo '<div class="d-flex justify-content-around flex-wrap">';
foreach($posts as $post){

	echo '<div class="card" style="width:400px">';
	echo '<div class="card-body">';
		echo '<h4 class="card-title">'.$post['titulo'].'</h4>';
		echo '<p class="card-text">'.$post['fecha'].'</p>';
		echo '<p class="card-text">'.$post['resumen'].'</p>';
		echo '<p class="card-text">'.$post['contenido'].'</p>';
	echo '</div>';
	echo '</div>';
}
include 'footer.php';
?>

