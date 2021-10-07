<?php 
	
	include("Conexion.php");
	try {
		
	
	$instancia = new Conexion();
	$conexion = $instancia->get_conexion();

	$sql ="SELECT *FROM tb_clientes";
	$statement = $conexion->prepare($sql);
	$statement->execute();
	$datos = $statement->fetchAll();

	print_r($datos);

	} catch (Exception $e) {
		print_r($e);
	}

?>