<?php session_start();
/* comprobar seseion*/
if (isset($_SESSION['cedula'])){
	header('Location: index.php');
}
/* check */

if(isset($_POST['recordar'])){
	setcookie("contraseña", $_POST['cedula']);
}
$errores = '';

/* comprobar si los datos an sido enviados*/
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$cedula = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
	
	$nombre = filter_var(strtolower($_POST['cedula']), FILTER_SANITIZE_STRING);

	try{
		$conexion = new PDO('mysql:host=localhost; dbname=autenticar','root', '');
	} catch (PDOException $e){
		echo "error: " . $e->getMessage();;
	}
	
	/* Verificar si hay usuarios*/
	
	$estado = $conexion ->prepare('
	SELECT * FROM usuarios WHERE cedula = :cedula AND nombre = :nombre'
	);
	
	$estado->execute(array(
		':cedula' =>$cedula,
		':nombre' =>$nombre
	));
	
	$resultado = $estado->fetch();
	if($resultado !== false){
		$_SESSION['usuario'] = $nombre;
		header('Location: index.php');
	} else {
		$errores .= '<li> Datos incorrectos</li>';
	}
}


require 'Vistas/login.view.php';
?>