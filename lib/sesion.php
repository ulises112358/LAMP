<?php
session_start();
if (!$_SESSION['user_sesion']) {
	header("Location:../logout.php"); /*direccionar al destructor de sesiones*/
}
?>