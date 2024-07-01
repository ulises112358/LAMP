<?php 
include "../lib/config.php";
include "../lib/Database.php"; 
include "../lib/sesion.php"; 
?>
<?php 
$db = new Database();
$query = "SELECT * FROM tb_login";
$read = $db->select($query);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Guadalupe">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">
	<link rel="shortcut icon" type="image/x-icon" href="../img/Captura.PNG">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../datatable/cssTabla/dataTables.bootstrap5.min.css">

	<title>Dashboard Template Bootstrap</title>
</head>
<body>  <!-- ==============NAV BAR=======-->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">DPW-307 TURNO NOCHE-MANANA</a>
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsadorl" aria-controls="colapsadorl" aria-expanded="false" aria-label ="Toggle navigation">
				<span class="navbar-toggler-icon"></span> 
			</button>
			<div class="collapse navbar-collapse" id="colapsadorl"> 
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white"hre="#">Publicidad</a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
						>Soporte</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
							<li><a class="dropdown-item" href="#">Producto-1</a></li> 
							<li><a class="dropdown-item" href="#">Producto-2</a></li> 
							<li><a class="dropdown-item" href="#">Producto-3</a></li> 
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Otras areas</a></li> 
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
				</ul>
			</div>
		</section>
	</nav>
	<!-- ====================================== END NAV BAR===================================================-->
	<section class="container-fluid">
		<section class="row">
			<aside id="colapsadorl" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!----------------------- colocar eL Logo de La empresa --------------------------->
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src=".../img/Captura.PNG" alt="" width="100"></li></center>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="template.php?msg=<?php// echo urlencode($user); ?>"></span data-feather="file"></span> IR A INICIO</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="">MOSTRAR PERSONAL</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PROOUCTOS</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR MOSTRAR ESTADISTICAS</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA</a></li>
							<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
						</ul>
					</div>
				</aside>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
					<article class="container">
						<! ===================ARTICULO DE PRESENTACION INSTITUTO================================--> 
						<?php
						if(isset($_GET['msg1'])){
							echo "<div class='alert alert-success fw-bold fs-5 text-end'><span>".$_GET['msg1']."</span></div>";
						} ?>
						<h3 class="display-4 text-center text-uppercase text-success mb-3">Lista de usuarios</h3>
						<!--REPORTES EN EXCEL-->
						<label class="label label-primary mb-4">
							<span><a href="../reportes/listaUsuarios.php" class="btn btn-success">Exportar a Excel</a></span>
							<span><a href="../reportes/listaUsuarios_word.php" class="btn btn-primary">Exportar a Word</a></span>
							<span><a href="../index_pdf2.php" class="btn btn-danger">Exportar a PDF</a></span>
						</label>
						
						<table id="tabla_dinamica" class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Numero</th> 
									<th scope="cor">Nombres</th> 
									<th scope="col">Apaterno</th> 
									<th scope="cor">Amaterno</th> 
									<th scope="cor">correo</th> 
									<th scope="col">Cargo</th>
									<th scope="col">Fecha_Creacion</th>
									<th scope="col">Foto</th>
									<th scope="col">Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($read as $row) {?>
									<tr>
										<td><?php echo $row['id_login']; ?></td> 
										<td><?php echo $row['nombre']; ?></td> 
										<td><?php echo $row['apaterno']; ?></td> 
										<td><?php echo $row['amaterno']; ?></td> 
										<td><?php echo $row['user']; ?></td> 
										<td><?php echo $row['rol_id']; ?></td>
										<td><?php echo $row['fecha_creacion']; ?></td>
										<?php if($row['foto']){?>
										<td><img class="img-thumbnail" width="100" src="../img/<?php echo $row['foto']; ?>"></td>
										<td><a href="updateUsuario.php?id_login=<?php echo urlencode($row['id_login']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
										<?php }
										else{?>
											<td><img class="img-thumbnail" width="100" src="../img/avatar.jpg"></td>
										<td><a href="updateUsuario.php?id_login=<?php echo urlencode($row['id_login']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
									</tr>
								<?php }
								} ?>
							</tbody>
						</table>
						<!-- =========== END OF ARTICULO DE PRESENTACION ESTUDIANTE================-->
					</article>
				</main>
			</section>
			<!-- PIE DE LA PAGINA-->
			<hr>
			<footer class="blockquote-footer text-center">
				<address>
					<small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
					<p class="lead font-weight-bold">GUADALUPE BLANCA ALIAGA ROMERO<br>LA PAZ - BOLIVIA <br> 2021</p>
				</address>
			</footer>
			<!--=---------------------------------------- END PIE DE LA PAGINA ---------------------------------------->
		</section>

		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/popper.min.js"></script>



		<script type="text/javascript" src="../datatable/jsTabla/jquery-3.5.1.js" ></script>		
		<script type="text/javascript" src="../dataTable/jsTabla/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../datatable/jsTabla/dataTables.bootstrap5.min.js" ></script>		

		<script>
			$(document).ready(function() {
				$('#tabla_dinamica').DataTable();
			});
		</script>
		</html>
