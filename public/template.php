<?php
include "../lib/config.php";
include "../lib/Database.php";
include "../lib/sesion.php";

$user= $_GET['msg']; /*obteniendo el id enviado desde signIn*/
?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name=author content="Guadalupe Blanca Aliaga Romero"> <meta name="KEYWORDS" content="inicio con bootstrap">
	<meta name="description" content="pagina mejorada de inicio con bootstrp5"> 
	<meta name="viewport" content="width-device-width, initial-scale-1"> 
	<title>PAGINA DOS - PHP-POO</title> 
	<link rel="shortcut icon" type="imaee/x-icon" href="../img/icono.jpg">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head> 
<body> 
	<!-- =====================================NAV BAR===========================-->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">DPW-307 TURNO NOCHE-MANANA</a> 
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button> 
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="#">Publicidad</a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded ="false">Soporte</a> 
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Producto-1</a></li>
							<li><a class="dropdown-item" href="#">Producto-2</a></li>
							<li><a class="dropdown-item" href="#">Producto-3</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href=”#” >Otras areas</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
				</ul>
				<h2 class="d-flex text-white"><?php echo $user; ?></h2>
			</div> 
		</section> 
	</nav>
	<!-- =====================================END NAV BAR===========================-->
	<section class="container-fluid">
		<section class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!-- ============================COLOCAR EL LOGO DE LA EMPRESA=======================-->
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/compa.png" alt="" width="100"></a></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="template.php"><span data-feather="file"></span>IR A INICIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="#">módulo de control de productos</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="registrar.php">módulo de registro de usuarios</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="#">módulo de control de clientes</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="#">módulo de control de empleados</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="#">módulo de control de Ventas</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action text-uppercase" href="#">módulo de control de reportes</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<article class="container mt-1 bg-dark text-light">
					<!-- ============================ARTICULO DE PRESENTACION INSTITUTO====================-->
					<div class="row featurette">
						<div class="col-md9">
							<h2 class="featurette-heading text-white">Instituto Tecnológico Marcelo Quiroga Santa Cruz</h2>
							<h3 class="featurette-heading text-info">Carrera:</h3>
							<p class="lead text-white">Sistemas Informáticos</p>
							<h3 class="featurette-heading text-info">Docente:</h3>
							<p class="lead text-white">Mg. Sc. Marco Antonio Dorado Gómez</p>
						</div>

						<div class="col-lg-3 col-md-12">
							<img src="../img/compa.png" align="right" alt="" class="img-fluid mt-3">
						</div>

					</div>
					<hr class="featurette-divider">
					<!-- ============================END OF ARTICULO DE PRESENTACION INSTITUTO====================-->
				</article>
				<article class="container mb-3 bg-light">
					<!-- ============================ARTICULO DE PRESENTACION ESTUDIANTE====================-->
					<hr class="featurette-divider">

					<div class="row featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading text-danger">Presentacion del <span class="text-muted">Proyecto.</span></h2>
							<h3 class="featurette-heading text-success">Nombre:</h3>
							<p class="lead">Guadalupe Blanca Aliaga Romero</p>
							<h3 class="featurette-heading text-success">Edad:</h3>
							<p class="lead">24 años</p>
							<h3 class="featurette-heading text-danger">Tipo del proyecto:</h3>
							<p class="lead">Sistema de escritorio en lenguaje C#</p>
							<h3 class="featurette-heading text-danger">Objetivos Específicos:</h3>
							<p class="lead">•	Rediseñar la pagina Web Principal de Fundación Compa.</p>
							<p class="lead">•	Diseñar un módulo de control de los materiales.</p>
							<p class="lead">•	Desarrollar un módulo de recopilación de información de Kardex.</p>
							<p class="lead">•	Desarrollar un módulo para el control de entrada a los materiales</p>
							<p class="lead">•	Desarrollar un módulo para registrar todas las transacciones de materiales</p>
							<p class="lead">•	Desarrollar un modulo de pedidos de materiales</p>
						<div class="col-lg-5 col-md-12"><!--colocar la foto del desarrollador-->
							<img src="../img/lupe.jpg" alt="" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid" width="800">
						</div>
					</div>
					<hr class="featurette-divider">
					<!-- ============================END OF ARTICULO DE PRESENTACION ESTUDIANTE====================-->
				</article>
			</main>
		</section>
		<!--PIE DE LA PAGINA-->
		<hr>
		<footer class="blockquote-footer text-center">
			<address>
				<small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
				<p class="lead font-weight-bold">GUADALUPE BLANCA ALIAGA ROERO<br>LA PAZ - BOLIVIA <br> 2021</p>
			</address>
		</footer>
		<!--END PIE DE LA PAGINA-->
	</section>

	<script src="../js/bootstrap.bundle.min.js"></script> 
	<script src="../js/popper.min.js"></script> 
</body> 
</html>