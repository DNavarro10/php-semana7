<?php 
	require('php/conexion.php');
	
	$query1 = "SELECT * FROM usuarios";
	$resultado1 = $conn ->query($query1);

	$query2 = "SELECT ROUND(AVG(edad),2) AS promedio FROM usuarios";
	$resultado2 = $conn ->query($query2);
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Contenido</title>
</head>
<body>
	<div class="contenedor contenedor2">
		<h1 class="titulo">Tabla de usuairos</h1>
		<hr class="border">
			<div class="contenido contenido2">
				<article class="mostrar-tabla">
					<div class="form-group table">
						<center><table>
							<thead>
									<tr class="centro">
										<td>Nombre</td>
										<td>Edad</td>
									</tr>
							</thead>
							<tbody>
									<?php while($row = $resultado1->fetch_assoc()){ ?>
									<tr>
										<td><?php echo $row['nombre']; ?></td>
										<td><?php echo $row['edad']; ?></td>
									</tr>
		
									<?php } ?>
							</tbody>
						</table>
						</center>
					</div>
				</article>
				<div class="form-group">
					<?php while ($row2 = mysqli_fetch_array($resultado2)){ ?>
					<p>Edad promedio :</p><?php echo $row2['promedio']; ?>
					<?php } ?>
				</div>
				
				<div>
				<a href="cerrar.php" id="cerrar">Cerrar</a>
				</div>
			</div>
	</div>
	
</body>
</html>