<?php 
	@session_start();
	include_once("../../Conexion/Modelo.php");
	$modelo = new Modelo();
	if (isset($_POST['desbloquear']) && $_POST['desbloquear']=="si_con_contrasena") {
		$sql = "SELECT 
					*FROM tb_persona AS tp
				JOIN tb_usuario as tu 
				ON tu.id_persona = tp.id
				WHERE (tp.email='$_SESSION[usuario]' OR tu.usuario = '$_SESSION[usuario]')
				";
		$resultado = $modelo->get_query($sql);
		if ($resultado[0]==1 && $resultado[4]==1) {
			$verificacion = $modelo->desencrilas_contrasena($_POST['contrasena'],$resultado[2][0]['contrasena']);
			if ($verificacion[0]===1) {
				$array = array("Exito","Bienvenido nuevamente ".$resultado[2][0]['nombre'],$resultado);
				$_SESSION['logueado']=true;
				$_SESSION['bloquear_pantalla']=false;
				print json_encode($array);

			}else{
				$array = array("Error","La contraseña no coincide",$resultado);
				print json_encode($array);
			}
		}else{
			$array = array("Error","Datos no existen",$resultado);
			print json_encode($array);
		}


	}else if (isset($_POST['iniciar_sesion']) && $_POST['iniciar_sesion']=="si_nueva") {
		

		$sql = "SELECT 
					*FROM tb_persona AS tp
				JOIN tb_usuario as tu 
				ON tu.id_persona = tp.id
				WHERE (tp.email='$_POST[correo]' OR tu.usuario = '$_POST[correo]')
				";

		$resultado = $modelo->get_query($sql);
		if ($resultado[0]==1 && $resultado[4]==1) {
			$verificacion = $modelo->desencrilas_contrasena($_POST['contrasena'],$resultado[2][0]['contrasena']);
			if ($verificacion[0]===1) {
				$array = array("Exito","Bienvenido al sistema ".$resultado[2][0]['nombre'],$resultado);
				$_SESSION['logueado']=true;
				$_SESSION['bloquear_pantalla']=false;
				$_SESSION['nombre']=$resultado[2][0]['nombre'];
				$_SESSION['tipo_persona']=$resultado[2][0]['tipo_persona'];
				$_SESSION['usuario']=$resultado[2][0]['usuario'];
				$_SESSION['correo']=$resultado[2][0]['email'];
				print json_encode($array);
			}else{
				$array = array("Error","La contraseña no coincide",$resultado);
				print json_encode($array);
			}
		}else{
			$array = array("Error","Datos no existen",$resultado);
			print json_encode($array);
		}
		


	}else{
		print json_encode(array("Error","No entro a ningun if"));
	}


?>