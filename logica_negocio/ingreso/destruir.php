<?php 
	
	@session_start();
	session_destroy();
	header("Location: ../ingreso/index.php");


?>