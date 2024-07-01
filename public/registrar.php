<?php
include "../lib/config.php";
include "../lib/sesion.php";
include "../lib/Database.php";

/*=========================REGISTRAR USUARIO00000000000000000*/
$db = new Database();
if (isset($_POST['submit'])) {
	$nombre = mysqli_real_escape_string($db->link, $_POST['nombre']);
	$apaterno = mysqli_real_escape_string($db->link, $_POST['apaterno']);
	$amaterno = mysqli_real_escape_string($db->link, $_POST['amaterno']);

	$user = mysqli_real_escape_string($db->link, $_POST['user']);
	$contra = mysqli_real_escape_string($db->link, $_POST['pass']);
	$rol = mysqli_real_escape_string($db->link, $_POST['rol']);
	$foto = (isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
	if($nombre == ''|| $apaterno == '' || $amaterno == '' || $user == '' || $contra == '' || $rol == '' || $foto == ''){
		header('Location:registrar.php?msg=' .urlencode('Debe llenar los campos'));
	}else{

		$fecha = new datetime();
		$nomArchivo= ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]: "lupe.jpg";
		$tmpfoto=$_FILES["foto"]["tmp_name"];
		/*ENCRIPTANDO LA CONTRASEÑA*/
		$pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);/*encriptando contraseña*/
		$query = "INSERT INTO tb_login(nombre, apaterno, amaterno, user, password,foto, rol_id) VALUES ('$nombre', '$apaterno', '$amaterno','$user', '$pass_cifrado', '$nomArchivo', '$rol')";
		if ($tmpfoto!= "") {
			move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
		}
		$create = mysqli_insert_id($db->registerUser($query, $user));
	}
}
?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name=author content="Guadalupe Blanca Aliaga Romero"> <meta name="KEYWORDS" content="inicio con bootstrap">
	<meta name="description" content="pagina mejorada de inicio con bootstrp5"> 
	<meta name="viewport" content="width-device-width, initial-scale-1"> 
	<title>PAGINA UNO - PHP-POO</title> 
	<link rel="shortcut icon" type="imaee/x-icon" href="../img/icono.jpg">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head> 
<body> 
	<section class="container">
		<div class="row bg-light">
			<div class="my-2"></div>
			<div class="col-sm-12 col-md-12 col-lg-6 float-left my-5">
				<article class="" style="text-align: justify;">
					<h2 class="display-5 text-success text-center font-weight-light text-uppercase"><em><strong>Curso DPW-II, proyecto PRIMERA ETAPA</strong></em></h3>
						<h4 class="text-uppercase text-danger font-italic"> Nombre del proyecto:</h4> 
						<p class="lead text-justify font-weight-bold font-italic">“SISTEMA DE CONTROL DE MATERIALES EDUCATIVOS PARA FUNDACION “COMPA””</p>
						<h4 class="text-uppercase text-danger font-italic">Objetivo General del proyecto:</h4>
						<p class="lead text-justify font-weight-bold font-italic">Desarrollar un sistema de control de materiales educativos para tener el registro actualizado, ordenado, confiable y seguro los procesos de entrada y salida de fundación COMPA</p>
						<h4 class="text-uppercase text-danger font-italic">Objetivo Especificos del proyecto:</h4>
						<p class="lead text-justify font-weight-bold font-italic">•	Rediseñar la pagina Web Principal de Fundación Compa.</p>
						<p class="lead text-justify font-weight-bold font-italic">•	Diseñar un módulo de control de los materiales.</p>
						<p class="lead text-justify font-weight-bold font-italic">•	Desarrollar un módulo de recopilación de información de Kardex.</p>
						<p class="lead text-justify font-weight-bold font-italic">•	Desarrollar un módulo para el control de entrada a los materiales</p>
						<p class="lead text-justify font-weight-bold font-italic">•	Desarrollar un módulo para registrar todas las transacciones de materiales</p>
						<p class="lead text-justify font-weight-bold font-italic">•	Desarrollar un modulo de pedidos de materiales</p>
					</article> 
				</div>


				<div class="col-sm-12 col-md-12 col-lg-6 float-right my-2">
					<form class="bg-secondary p-3 m-5 rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"enctype="multipart/form-data">
						<?php
						if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
							echo "<center><div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
						}
						?>
						<?php
		error_reporting(E_ALL^E_NOTICE); /*deja de maostrar
		notificaciones*/
		if ($_GET["error"]=="si") {
			echo '<div class="alert alert-danger" role="alert"><center><strong>Op! - Verifica tus datos. </center></strong></div>';
		}
		else{ echo "";}
		?>
		<h2 class="display-5 text-center fw-bold">REGISTRAR USUARIOS</h2>
			<div class="form-group mb-3">
			<input type="text" class="form-control" placeholder="Introduzca Nombres" name="nombre" id="nombre">
		</div> 
		<div class="form-group mb-3">
			<input type="text" class="form-control" placeholder="Introduzca ApellidoPaterno" name="apaterno" id="apaterno">
		</div> 
		<div class="form-group mb-3">
			<input type="text" class="form-control" placeholder="Introduzca ApellidoMaterno" name="amaterno" id="amaterno">
		</div> 
		<div class="form-group mb-3">
			<input type="email" class="form-control" placeholder="Introduzca Correo" name="user" id="user">
		</div> 
		<div class="form-group mb-3">
			<input type="password" class="form-control" placeholder="Introduzca Contraseña" name="pass" id="pass">
		</div> 
		<select name="rol" id="rol" class="form-control mt-3">
			<option value=""> - Seleccionar los roles del nuevo usuario - </option>
			<option value="1">Administrador</option>
			<option value="2">Colaborador</option>
			<option value="3">Invitado</option>
		</select>
		<div class="input-group mb-3">
			<input type="file" accept="image/*" name="foto" id="foto" class="form-control mt-3">
		</div>
		<div class="my-4">
			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input">
				<span class="custom-control-indicator"></span>
				<span class="custom-control-description text-white"> Recordar contraseña en esta computadora</span>
			</label>
		</div>
		<div class="form-group d-grid gap-2 mb-3">
			<button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Guardar Datos</button>
			<span><a class="btn btn-warning btn-block btn-lg d-grid gap-2" href="registrar.php">Limpiar Datos</a></span>
			<span><a class="btn btn-danger btn-block btn-lg d-grid gap-2" href="../logout.php">Salir del Sistema</a></span>
		</div>
	</form>
</div>
</div>
</section>
</section>
		<!--PIE DE LA PAGINA-->
		<hr>
		<footer class="blockquote-footer text-center">
			<address>
				<small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
				<p class="lead font-weight-bold">GUADALUPE BLANCA ALIAGA ROMERO<br>LA PAZ - BOLIVIA <br> 2021</p>
			</address>
		</footer>
	
		<!--END PIE DE LA PAGINA-->
	</section>
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/popper.min.js"></script> 
</body> 
</html>