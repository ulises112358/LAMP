<?php
include('config.php');
include('Database.php');
$db= new DataBase();
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	/*La funcion de las variables nos permiten evitar SQL-injection */
	$user = mysqli_real_escape_string($db->link, $_POST['user']); 
	$pass = mysqli_real_escape_string($db->link, $_POST['pass']);
	if(empty($user) || empty($pass)){
		header('Location:../index.php?msg='.urlencode('Debe llenar los campos'));
	}
	else{
		$query = "SELECT * FROM tb_login WHERE user='$user'";/*consulta SQL */ 
		$result = $db->select($query); /*Llamando a la funcion select de la clase padre?*/
		if (mysqli_num_rows($result)) {/*funcion que me permite obtener la fila de la tabla*/
			while ($row = mysqli_fetch_array($result)) {/*"recorrer array obtenido*/
			if (sha1($pass) == $row[ 'password']) { /*comparar variable con valor del array*/
				session_start();
				$_SESSION['user_sesion']= $user;
				$_SESSION['password_sesion']=$pass;
				$login = $db->signIn($query, $_SESSION['user_sesion']);/*Llamando a la funcion select de la clase padre*/
			}
			else{
				header("Location: ../index.php?error=si");
			}
		}
	}/*"end del if*/ 
	else{ header("Location: ../index.php?error=si");
}/*end- del else*/ 
}/*end del else*/ 
}/*end del if*/
?>