<?php
include 'consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		/*function crearEntrada(url){
			ajax("crearEntrada.php","cuerpo");
		}
		function ajax(url, container){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById(container).innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", url, true);
			xhttp.send();
		}*/
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<header>
		<h1><span class="badge badge-secondary">My blog</span></h1>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	
			<ul class="navbar-nav">
				<li class="nav-item active">
				  <a class="nav-link" href="./index.php">Inicio</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="./index.php?categoria=2">Deportes</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="./index.php?categoria=3">Tecnología</a>
				</li>
				<?php
					session_start();
					if(!isset($_SESSION["rol"])){
						echo '<li class="nav-item">
								<a class="nav-link" href="./login.php">Login</a>
							</li>';
					}else if(isset($_SESSION["rol"]) && $_SESSION["rol"]==0){
						echo '<li class="nav-item">
							<a class="nav-link" href="./crearEntrada.php">Crear entrada</a>
						</li>';
						echo '<li class="nav-item">
							<a class="nav-link" href="./eliminarEntrada.php">Eliminar entrada</a>
						</li>';
						echo '<li class="nav-item">
							<a class="nav-link" href="./logout.php">Salir</a>
						</li>';
					}
				?>
			</ul>
		</nav>
	</header>