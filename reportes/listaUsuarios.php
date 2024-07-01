<?php 
include "../lib/config.php";
include "../lib/Database.php"; 
include "../lib/sesion.php"; 
header("Content-type:application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body> 
	<table>
		<center><h3> REPORTE PERSONAL DEL SISTEMA</h3></center>
		<hr>
		<thead>
			<tr style="background-color: black; color: white">
				<th scope="col">Numero</th> 
				<th scope="cor">Nombres</th>
				<th scope="col">Apaterno</th> 
				<th scope="cor">Amaterno</th> 
				<th scope="cor">correo</th> 
				<th scope="col">Cargo</th>
				<th scope="col">Fecha_Creacion</th>
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
				</tr>
				<?php }  ?>
			</tbody>
		</table>
			<hr>
			</body>
					</html>
