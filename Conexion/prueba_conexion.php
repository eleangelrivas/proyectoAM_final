<?php 
	
	include("Modelo.php");
	try {
		
	
	$instancia = new Modelo(); 

	$sql ="SELECT id FROM tb_persona WHERE email = 'ele@gmail.com'";
	$resultado = $instancia->get_query($sql);

	print_r($resultado);

	} catch (Exception $e) {
		print_r($e);
	}

?>