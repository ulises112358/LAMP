<?php
	include "../lib/config.php";
	include "../lib/dataBase.php";
	include "../lib/sesion.php";
	$id=$_GET['id_login'];
	$db=new Database();
	$query ="SELECT * FROM tb_login WHERE id_login = $id ";
	$getData = $db->select($query)->fetch_assoc();

/*======================= ??? ========================*/
	if(isset($_POST['submit'])) {
		$nombre   = mysqli_real_escape_string($db->link, $_POST['nombre']);
		$apaterno = mysqli_real_escape_string($db->link, $_POST['apaterno']);
		$amaterno = mysqli_real_escape_string($db->link, $_POST['amaterno']);
		$user     = mysqli_real_escape_string($db->link, $_POST['user']);
		$pass     = mysqli_real_escape_string($db->link, $_POST['pass']);
		$rol_id   = mysqli_real_escape_string($db->link, $_POST['rol_id']);
		$foto     = (isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
		//$foto = mysqli_real_escape_string($db->link, $_POST['foto']);
		if($nombre == ''|| $apaterno == '' || $amaterno == ''|| $user == '' || $pass == '' || $rol_id == '' || $foto == ''){
			$error = "Los campos no deben de estar vacios!!!!!!!!";
		}
		else{

			$fecha = new DateTime();
			$nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"../img/avatar.jpg";
			$tmpfoto=$_FILES["foto"]["tmp_name"];
			if($tmpfoto !=""){
				move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
				$sentencia="SELECT * FROM tb_login WHERE id_login=$id";
				$read = $db->select($query);
			}
			if(isset($nomArchivo["foto"])){
				if(file_exists("../img/".$nomArchivo["foto"])){
					if($nomArchivo['foto'] != "avatar.jpg"){
						unlink("../img/".$nomArchivo["foto"]);
					}
				}
			}
			/*============================= ACTUALIZAR DATOS ====================================*/
			$pass_cifrado = password_hash($pass, PASSWORD_DEFAULT);
			$query = "UPDATE tb_login
					  SET 	 nombre = '$nombre',
					  		 apaterno = '$apaterno',
					  		 amaterno = '$amaterno',
					  		 user = '$user',
					  		 password = '$pass_cifrado',
					  		 rol_id = '$rol_id',
					  		 foto = '$nomArchivo' 
					  WHERE id_login = '$id'";

			$update = $db->updateUser($query,$user);
		}
	}
	/*==============================ELIMINAR DATOS ============================================*/
	if(isset($_POST['delete'])){
		$query = "DELETE FROM tb_login WHERE id_login = $id ";
		$deleteData = $db->deleteUser($query);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=author content="jheison flores vargas">
	<meta name="KEYWORDS" content="inicio de bootstrap">
	<meta name="description" content="pagina mejorada de inicio con bootstrap5">
	<meta name="viewport" content="width = device-width, initial-scale=1">
	<title>Dashboard Template - Bootstrap</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/JF.png">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<!--================================= NAV BAR ===================================-->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<!--<a class="navbar-brand text-white" href="#">DPW-307 TURNO NOCHE_MAÑANA</a>-->
			<img src="../img/logoEmp.png" alt="" width="200">
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="#">Publicidad</a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Soporte</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Producto1</a></li>
							<li><a class="dropdown-item" href="#">Producto2</a></li>
							<li><a class="dropdown-item" href="#">Producto3</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Otras areas</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disable="true">Disable</a></li>
				</ul>
				
			</div>
		</section>
	</nav>
	<!--================================= END NAV BAR ===================================-->
	<section class="container-fluid">
		<section class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!-- colocar el logo de la empresa--> 
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><img src="../img/logoEmp1.jpg" alt="" width="150"></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="presentacion1.php"><span data-feather="file"></span> IR A INICIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PERSONAL</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li> 
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR CARGA</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR SALIDAS</a></li>
						<li class="nav-item"> <a class="list-group-item list-group-item-action" href="#"> MOSTRAR ESTADISTICAS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA </a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DE SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<article class="container mt-1">
					<!--======== ?????????? =======-->
					<form action="updateUsuario.php?id_login=<?php echo $id;?>" method="POST" class="col-lg-6" enctype="multipart/form-data">
					<?php
						if(isset($error)){
						echo '<center><div class="alert alert-danger"><span>'.$error."</span></div></center>";
						}
						?>
						<h2 class="display-6 text-danger fw-bold text-uppercase mb-5"><center>Actualizar Datos</center></h2>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar nombre" name="nombre" id="nombre" value="<?php echo $getData['nombre']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar apellido paterno" name="apaterno" id="apaterno" value="<?php echo $getData['apaterno']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar apellido materno" name="amaterno" id="amaterno" value="<?php echo $getData['amaterno']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar nueva contraseña" name="user" id="user" value="<?php echo $getData['user']?>">
						</div>
						<div class="form-group mb-3">
							<input type="password" class="form-control" placeholder="Registrar nueva contraseña" name="pass" id="pass" value="">
						</div>
						<select name="rol_id" id="rol_id" class="form-control mb-5 text-primary">
							<option value="<?php echo $getData['rol_id']?>"selected><?php echo $getData['rol_id']?></option>
							<option value="1">Administrador</option>
							<option value="2">Colaborador</option>
							<option value="3">Secretaria</option>
							<option value="4">Invitado</option>
							<option value="5">Cliente</option>							
						</select>

						<div class="mb-3">
							<label class="imagen lead text-primary">foto:(*)</label>
							<?php if($getData['foto']){ ?>
							<center><img class="img-thumbnail"  width="200px" src="../img/<?php echo $getData['foto'] ?>" alt="avatar.jpg"></center><br>
							
							<?php }else{ ?>
							<center><img class="img-thumbnail" width="200px" src="../img/avatar.jpg" alt="avatar.jpg"></center> <br>
							<?php } ?>
							<input type="file" accept="image/*" name="foto" id="foto" class="form-control">
						</div>


						<div class="mb-3">
							<center>
								<button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar</button>
								<button type="submit" name="delete" id="delete" value="delete" class="btn btn-danger">Eliminar</button>
								<a href="listaUsuarios.php" class="btn btn-info">Cancelar</a>
							</center>
						</div>						
				</form>
					<!-- =========== END OF ARTICULO DE PRESENTACION INSTITUTO ========-->
				</article>
			</main>
		</section>
		<!-- PIE DE LA PAGINA --> 
		<hr> 
		<footer class="blockquote-footer text-center"> 
			<address>
				<small class-"font-weight-bold text-uppercase">&copy;todos los derechos reservados </small><br>
				<p class="lead font-weight-bold"> JHEISON FLORES VARGAS <br>LA PAZ - BOLIVIA <br> 2021</p>
			</address> 
		</footer>
		<!-- END PIE DE LA PAGINA --> 
	</section>
	<script src="../js/bootstrap.min.js"></script>
	<script src-"../js/popper.min.js"></script> 
</body>
</html><?php
	include "../lib/config.php";
	include "../lib/dataBase.php";
	include "../lib/sesion.php";
	$id=$_GET['id_login'];
	$db=new Database();
	$query ="SELECT * FROM tb_login WHERE id_login = $id ";
	$getData = $db->select($query)->fetch_assoc();

/*======================= ??? ========================*/
	if(isset($_POST['submit'])) {
		$nombre   = mysqli_real_escape_string($db->link, $_POST['nombre']);
		$apaterno = mysqli_real_escape_string($db->link, $_POST['apaterno']);
		$amaterno = mysqli_real_escape_string($db->link, $_POST['amaterno']);
		$user     = mysqli_real_escape_string($db->link, $_POST['user']);
		$pass     = mysqli_real_escape_string($db->link, $_POST['pass']);
		$rol_id   = mysqli_real_escape_string($db->link, $_POST['rol_id']);
		$foto     = (isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
		//$foto = mysqli_real_escape_string($db->link, $_POST['foto']);
		if($nombre == ''|| $apaterno == '' || $amaterno == ''|| $user == '' || $pass == '' || $rol_id == '' || $foto == ''){
			$error = "Los campos no deben de estar vacios!!!!!!!!";
		}
		else{

			$fecha = new DateTime();
			$nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"../img/avatar.jpg";
			$tmpfoto=$_FILES["foto"]["tmp_name"];
			if($tmpfoto !=""){
				move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
				$sentencia="SELECT * FROM tb_login WHERE id_login=$id";
				$read = $db->select($query);
			}
			if(isset($nomArchivo["foto"])){
				if(file_exists("../img/".$nomArchivo["foto"])){
					if($nomArchivo['foto'] != "avatar.jpg"){
						unlink("../img/".$nomArchivo["foto"]);
					}
				}
			}
			/*============================= ACTUALIZAR DATOS ====================================*/
			$pass_cifrado = password_hash($pass, PASSWORD_DEFAULT);
			$query = "UPDATE tb_login
					  SET 	 nombre = '$nombre',
					  		 apaterno = '$apaterno',
					  		 amaterno = '$amaterno',
					  		 user = '$user',
					  		 password = '$pass_cifrado',
					  		 rol_id = '$rol_id',
					  		 foto = '$nomArchivo' 
					  WHERE id_login = '$id'";

			$update = $db->updateUser($query,$user);
		}
	}
	/*==============================ELIMINAR DATOS ============================================*/
	if(isset($_POST['delete'])){
		$query = "DELETE FROM tb_login WHERE id_login = $id ";
		$deleteData = $db->deleteUser($query);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=author content="jheison flores vargas">
	<meta name="KEYWORDS" content="inicio de bootstrap">
	<meta name="description" content="pagina mejorada de inicio con bootstrap5">
	<meta name="viewport" content="width = device-width, initial-scale=1">
	<title>Dashboard Template - Bootstrap</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/JF.png">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<!--================================= NAV BAR ===================================-->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<!--<a class="navbar-brand text-white" href="#">DPW-307 TURNO NOCHE_MAÑANA</a>-->
			<img src="../img/logoEmp.png" alt="" width="200">
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="#">Publicidad</a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Soporte</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Producto1</a></li>
							<li><a class="dropdown-item" href="#">Producto2</a></li>
							<li><a class="dropdown-item" href="#">Producto3</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Otras areas</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disable="true">Disable</a></li>
				</ul>
				
			</div>
		</section>
	</nav>
	<!--================================= END NAV BAR ===================================-->
	<section class="container-fluid">
		<section class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!-- colocar el logo de la empresa--> 
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><img src="../img/logoEmp1.jpg" alt="" width="150"></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="presentacion1.php"><span data-feather="file"></span> IR A INICIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PERSONAL</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li> 
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR CARGA</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR SALIDAS</a></li>
						<li class="nav-item"> <a class="list-group-item list-group-item-action" href="#"> MOSTRAR ESTADISTICAS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA </a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DE SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<article class="container mt-1">
					<!--======== ?????????? =======-->
					<form action="updateUsuario.php?id_login=<?php echo $id;?>" method="POST" class="col-lg-6" enctype="multipart/form-data">
					<?php
						if(isset($error)){
						echo '<center><div class="alert alert-danger"><span>'.$error."</span></div></center>";
						}
						?>
						<h2 class="display-6 text-danger fw-bold text-uppercase mb-5"><center>Actualizar Datos</center></h2>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar nombre" name="nombre" id="nombre" value="<?php echo $getData['nombre']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar apellido paterno" name="apaterno" id="apaterno" value="<?php echo $getData['apaterno']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar apellido materno" name="amaterno" id="amaterno" value="<?php echo $getData['amaterno']?>">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control text-primary" placeholder="Registrar nueva contraseña" name="user" id="user" value="<?php echo $getData['user']?>">
						</div>
						<div class="form-group mb-3">
							<input type="password" class="form-control" placeholder="Registrar nueva contraseña" name="pass" id="pass" value="">
						</div>
						<select name="rol_id" id="rol_id" class="form-control mb-5 text-primary">
							<option value="<?php echo $getData['rol_id']?>"selected><?php echo $getData['rol_id']?></option>
							<option value="1">Administrador</option>
							<option value="2">Colaborador</option>
							<option value="3">Secretaria</option>
							<option value="4">Invitado</option>
							<option value="5">Cliente</option>							
						</select>

						<div class="mb-3">
							<label class="imagen lead text-primary">foto:(*)</label>
							<?php if($getData['foto']){ ?>
							<center><img class="img-thumbnail"  width="200px" src="../img/<?php echo $getData['foto'] ?>" alt="avatar.jpg"></center><br>
							
							<?php }else{ ?>
							<center><img class="img-thumbnail" width="200px" src="../img/avatar.jpg" alt="avatar.jpg"></center> <br>
							<?php } ?>
							<input type="file" accept="image/*" name="foto" id="foto" class="form-control">
						</div>


						<div class="mb-3">
							<center>
								<button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar</button>
								<button type="submit" name="delete" id="delete" value="delete" class="btn btn-danger">Eliminar</button>
								<a href="listaUsuarios.php" class="btn btn-info">Cancelar</a>
							</center>
						</div>						
				</form>
					<!-- =========== END OF ARTICULO DE PRESENTACION INSTITUTO ========-->
				</article>
			</main>
		</section>
		<!-- PIE DE LA PAGINA --> 
		<hr> 
		<footer class="blockquote-footer text-center"> 
			<address>
				<small class-"font-weight-bold text-uppercase">&copy;todos los derechos reservados </small><br>
				<p class="lead font-weight-bold"> JHEISON FLORES VARGAS <br>LA PAZ - BOLIVIA <br> 2021</p>
			</address> 
		</footer>
		<!-- END PIE DE LA PAGINA --> 
	</section>
	<script src="../js/bootstrap.min.js"></script>
	<script src-"../js/popper.min.js"></script> 
</body>
</html>