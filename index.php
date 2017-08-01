<?php session_start();

if (isset($_SESSION['cedula'])) {
	header('Location: contenido.php');
} else {
	header('Location: login.php');
	
}
?>