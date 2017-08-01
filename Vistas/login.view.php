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
		<h1 class="titulo">Login</h1>
		<hr class="border">
			<div class="contenido">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" name="login" method="post">
					<div class="form-group">
						<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="usuario" placeholder="Usuario" required="">
					</div>
					<div class="form-group">
						<i class="icono izquierda fa fa-lock"></i><input type="password" name="cedula" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" class="password_btn" placeholder="cedula" required="">
					</div>
					
					<div class="form-group accion">
						<div>
						<label for="recordar">Recordar contraseña :</label>
						<input class="checkbox" type="checkbox" name="remenber" <?php if(isset($_COOKIE['password'])){echo "checked='checked'"; } ?> value="1">
						
						</div>
					</div>
					<div class="form-group accion">
						<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
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
				<p class="texto-registrate">No tienes cuenta?<a id="cerrar" href="registrate.php">Ir a registro</a>
				</p>
			</div>
	</div>
	
</body>
</html>