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
				$_SESSION['logueado']="si";
				$_SESSION['bloquear_pantalla']="no";
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

		$_SESSION['intentos'] = (isset($_SESSION['intentos'])) ? "":0;
		if ($_SESSION['intentos']==3) {
			$_SESSION['hora_bloqueo']=date("Y-m-d G:i:s");
			print json_encode("Bloqueo");
		}else{
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
					
					$_SESSION['logueado']="si";
					$_SESSION['bloquear_pantalla']="no";
					$_SESSION['nombre']=$resultado[2][0]['nombre'];
					$_SESSION['tipo_persona']=$resultado[2][0]['tipo_persona'];
					$_SESSION['usuario']=$resultado[2][0]['usuario'];
					$_SESSION['correo']=$resultado[2][0]['email'];

					$array = array("Exito","Bienvenido al sistema ".$resultado[2][0]['nombre'],$resultado,$_SESSION);
					print json_encode($array);
				}else{
					$_SESSION['intentos']++;
					$array = array("Error","La contraseña no coincide",$resultado,$_SESSION);
					print json_encode($array);
				}
			}else{
				$array = array("Error","Datos no existen",$resultado);
				print json_encode($array);
			}
		}
		


	}else{
		print json_encode(array("Error","No entro a ningun if"));
	}


?>