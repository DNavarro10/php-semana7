<?php 
	$host = "localhost";
	$user = "root";
	$db = "autenticar";
	$pass = "";

	$conn = new mysqli($host,$user,$pass,$db);
	
	if(mysqli_connect_error()){
		echo 'Error en conexion ' , mysqli_connect_error();
		exit();
	}
?>