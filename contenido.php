<?php session_start();
	

	if(isset($_SESSION['cedula'])){
		require ('vistas/contenido.view.php');
	} else {
		header('Location: login.php');
	}
	
	 if (isset($_REQUEST['remember']))
	   $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

	 $cookie_time = 60 * 60 * 24 * 30; 
	  $cookie_time_Onset=$cookie_time+ time();
	  if (isset($escapedRemember)) {

    setcookie("password", $escapedPW, $cookie_time_Onset);  

  } else {

      $cookie_time_fromOffset=time() -$cookie_time;

    	setcookie("password", '', $cookie_time_fromOffset);  

  }
	
?>