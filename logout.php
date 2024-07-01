<?php
session_start();//Inicia una nueva sesion o reanuda la existente.
session_destroy();//Destruye toda la informacion registrado de una sesison
header("Location:index.php");//Redirecciona a la pagina de inicio
exit();
?>