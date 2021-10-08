<?php 
	
	include("Conexion.php");
	try {
		
	
	$instancia = new Conexion();
	$conexion = $instancia->obtene_conexion();

	$sql ="SELECT *FROM tb_persona";
	$statement = $conexion->prepare($sql);
	$statement->execute();
	$datos = $statement->fetchAll();

	print_r($datos);

	} catch (Exception $e) {
		print_r($e);
	}

?>