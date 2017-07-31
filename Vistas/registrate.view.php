<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://use.fontawesome.com/323a076c8b.js"></script>
	<link rel="stylesheet" href="CSS/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Registro</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Formulario de registro</h1>
		<hr class="border">
			<div class="contenido">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" name="login" method="post">
					<div class="form-group">
						<i class="icono izquierda fa fa-user"></i><input type="text" name="cedula" class="usuario" placeholder="Cedula">
					</div>
					<div class="form-group">
						<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="password" placeholder="Nombre">
					</div>
					<div class="form-group">
						<i class="icono izquierda fa fa-user"></i><input type="text" name="edad" class="password_btn" placeholder="Edad">
					</div>
					<div class="form-group accion">
						<a href="index.php"><i class="submit-btn fa fa-arrow-left" onclick="history.back()"></i></a>
						
						<i class="submit-btn btn-2 fa fa-arrow-right" onclick="login.submit()"></i>
					</div>
					<?php if(!empty($errores)): ?>
						<div class="error">
							<ul>
								<?php echo $errores; ?>	
							</ul>
						</div>
					<?php endif; ?>
				</form>	
			</div>
			<div class="form-group registro">
				<p class="texto-registrate">
				Ya tienes cuenta?
				<a id="cerrar" href="login.php">Iniciar session</a>
				</p>
			</div>
	</div>
	
</body>
</html>