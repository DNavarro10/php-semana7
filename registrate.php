<?php session_start();

if (isset($_SESSION['cedula'])){
	header('Location: index.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	$cedula = filter_var(strtolower($_POST['cedula']), FILTER_SANITIZE_STRING);
	$nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
	$edad = filter_var(strtolower($_POST['edad']), FILTER_SANITIZE_STRING);
	
	/* comprobar errores*/
	$errores = '';
	
	/* comprobar conexion*/
	if (empty($cedula) or empty($nombre) or empty($edad)){
		$errores .= '<li>Por favor llenar los datos faltantes</li>';
	} else {
		try{
			$conexion = new PDO('mysql:host=localhost; dbname=autenticar','root', '');
		} catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		/* verificar si existe cedula
		 	PREPARE para preparar la consulta , :cedula por placeholder
		*/
		
		$estado = $conexion->prepare('SELECT * FROM usuarios WHERE cedula = :cedula LIMIT 1');
		$estado->execute(array(':cedula' => $cedula));
		$resultado = $estado->fetch();
		/* $resultado guarda  O registro de cedula O false*/
		
		if ($resultado != false){
			$errores .= '<li>El usuario ya existe</li>';
		}
	
	}
	/* si error = '' , no hay errores*/
	if($errores == ''){
		$estado = $conexion->prepare('INSERT INTO usuarios (cedula, nombre, edad) 
		VALUES (:cedula, :nombre, :edad)');
		
		$estado ->execute(array(
			':cedula'=> $cedula, 
			':nombre' => $nombre,
			':edad' => $edad
		));
		
	
		
		header('Location: login.php');
		
	}

}

	/* Vista del formulario */
	require 'Vistas/registrate.view.php';
?>