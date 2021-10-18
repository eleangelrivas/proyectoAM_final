<?php 
	@session_start();
	require_once 'Conexion.php';
	require_once 'configuraciones.php';

	/**
	* 
	*/
	class Modelo 
	{
		
		function __construct()
		{
			# code...
		}

		public static function extension_archivo($extension){
            if ($extension=="pdf") { 
                $miextension="PDF";
            }else if ($extension=="doc" || $extension=="docx") { 
                $miextension="DOC";
            }else if ($extension=="xls" || $extension=="xlsx") { 
                $miextension="EXCEL";
            }else{ 
                $miextension="img";
            }

            return $miextension;
        }
		public static function seleccionar_todo($array,$orde=""){
			$as = 0;
			$tabla= $campo = $llaves = $valor = "";

			foreach(array_keys($array) as $key ) {
				$as++;
				if ($key === 'table') {//obtengo tabla
	 				$tabla = $array[$key];
	 			}else if ($as===2) {//obtengo el where
	 				$valor = $array[$key];
	 				$campo = $key;
	 			}else if ($as>2) {//obtengo valores a sacar
	 				$llaves.=$key;
					if ($as <count($array)) {
							$llaves.=",";
					}
	 			} 
			}

			$sql = "SELECT $llaves FROM $tabla WHERE $campo = '$valor' $orde";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		$resultado = $comando->fetchAll();
	       		return array("1",$resultado,$sql,$array);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function seleccionar_especifico_detabla($array,$orde=""){
			$as = 0;
			$tabla= $campo = "";

			foreach(array_keys($array) as $key ) {
				$as++;
				if ($key === 'table') {//obtengo tabla
	 				$tabla = $array[$key];
	 			}else if ($as>=2) {//obtengo tabla
	 				if($as==3)$campo.=",";
	 				$campo .= $key;
	 				if ($as <count($array) && ($as>2)) {
						$campo.=",";
					}
	 			} 
			}

			$sql = "SELECT $campo FROM $tabla $orde";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		$resultado = $comando->fetchAll();
	       		return array("1",$resultado,$sql,$as);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql,$array);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function seleccionar_todos_union($array1,$array2){
			$as = 0;
			$tabla1= $campo1 = "";
			$tabla2= $campo2 = "";

			foreach(array_keys($array1) as $key ) {
				$as++;
				if ($key === 'table') {//obtengo tabla
	 				$tabla1 = $array1[$key];
	 			}else if ($as>=2) {//obtengo tabla
	 				if($as==3)$campo1.=",";
	 				$campo1 .= $key;
	 				if ($as <count($array1) && ($as>2)) {
						$campo1.=",";
					}
	 			} 
			}
			$as = 0;
			foreach(array_keys($array2) as $key ) {
				$as++;
				if ($key === 'table') {//obtengo tabla
	 				$tabla2 = $array2[$key];
	 			}else if ($as>=2) {//obtengo tabla
	 				if($as==3)$campo2.=",";
	 				$campo2 .= $key;
	 				if ($as <count($array2) && ($as>2)) {
						$campo2.=",";
					}
	 			} 
			}

			$sql = "SELECT $campo1 FROM $tabla1 ";
			$sql.= " UNION SELECT $campo2 FROM $tabla2 ";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		$resultado = $comando->fetchAll();
	       		return array("1",$resultado,$sql,$as);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql,$array);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function get_todos($tabla,$where=""){
			$sql="SELECT * FROM $tabla $where";
			try{
				$comando=Conexion::getInstance()->getDb()->prepare($sql);
				$comando->execute();
				$result=$comando->fetchAll(PDO::FETCH_ASSOC);
				$cuantos = $comando->rowCount();
				return array(1,"exito",$result,"",$cuantos);
			}catch(Exception $e){
				return array(-1,"error",$e->getMessage(),$sql);
			}
		}
		public static function get_query($query,$tipo=""){
			$sql=$query;
			try{
				$comando=Conexion::getInstance()->getDb()->prepare($sql);
				$comando->execute();
				if ($tipo=="") {
					$result=$comando->fetchAll(PDO::FETCH_ASSOC);
				}
				$cuantos = $comando->rowCount();
				return array(1,"exito",$result,$query,$cuantos);
			}catch(Exception $e){
				return array(-1,"error",$e->getMessage(),$sql);
			}
		}
		public static function get_query2($query,$orde=""){
			$as = 0;
			$tabla= $campo = $llaves = $valor = "";

			$sql = $query;
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		$resultado = $comando->fetchAll();
	       		return array("1",$resultado,$sql,$array);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function insertar_query($query){

			$sql = $query;
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		return array("1",$elcodigo,"Insertado",$sql);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function seleccionar_cualquiera($array,$and=""){
			$as = 0;
			$tabla= $campo = "";

			foreach(array_keys($array) as $key ) {
				$as++;
				if ($key === 'table') {//obtengo tabla
	 				$tabla = $array[$key];
	 			}else if ($as===2) {//obtengo id
	 				$campo = $array[$key];
	 			}else if ($as===3) {//obtengo value
	 				$whereid = $key;
	 				$valor_whereid = $array[$key];
	 			}
			}

			$sql = "SELECT $campo FROM $tabla WHERE $whereid = '$valor_whereid' $and";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		
	       		$resultado = $comando->fetchAll(PDO::FETCH_COLUMN, 0);

	       		if ($comando->rowCount()>0) {
	       			$cuantos = $comando->rowCount();
	       			return array(1,$resultado[0],$sql,"",$cuantos,$cuantos);
	       		}else{
	       			$cuantos = $comando->rowCount();
	       			return array(0,array(),$sql,"",$cuantos,$cuantos);
	       		}
	       		
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}		
		public static function retonrar_id_insertar($tabla){
			$gsent = Conexion::getInstance()->getDb()->prepare("SELECT COUNT(*) FROM $tabla");
			$gsent->execute();
			$resultado = $gsent->fetchAll(PDO::FETCH_COLUMN, 0);
			return date("Yidisus").'-'.($resultado[0]+1);
		}
		public static function retornar_id_insertar($tabla){
			$gsent = Conexion::getInstance()->getDb()->prepare("SELECT COUNT(*) FROM $tabla");
			$gsent->execute();
			$resultado = $gsent->fetchAll(PDO::FETCH_COLUMN, 0);
			return date("Yidisus").'-'.($resultado[0]+1);
		}

		public static function retornar_correlativo($codigo){
			$comando=Conexion::getInstance()->getDb()->prepare("SELECT COUNT(*) as suma FROM tb_insumo_detalle WHERE codigo_insumo='$codigo'");
			$comando->execute();
			while($row=$comando->fetch(PDO::FETCH_ASSOC)){
				$resultado=$row['suma'];
			}
			return $codigo.'-'.($resultado+1);
		}

		public static function correlativo($tabla,$codigo){
			$sql ="SELECT COUNT(*) as suma FROM $tabla WHERE codigo_mtto='$codigo'";
			$comando=Conexion::getInstance()->getDb()->prepare($sql);
			$comando->execute();
			while($row=$comando->fetch(PDO::FETCH_ASSOC)){
				$resultado=$row['suma'];
			}
			return $codigo.'-'.($resultado+1);
		}

		public static function retornar_imagen($array_imagen){
			$tabla = $campo_buscar = $valor_campo_buscar = $campo_comparar = "";
			$as=0;

			foreach(array_keys($array_imagen) as $key ) {//recorro el array que me envia mi json
	 			$as++;
	 			if ($key === 'table') {//obtengo tabla
	 				$tabla = $array_imagen[$key];
	 			}else if ($as===2) {
	 				$valor_campo_buscar = $array_imagen[$key];
	 				$campo_comparar= $key;
	 			}
	 			else if ($key === 'campo') {//obtengo el campo a comparar
	 				$campo_buscar = $array_imagen[$key];
	 				 
				}
			}

			$sql = "SELECT $campo_buscar FROM $tabla WHERE $campo_comparar = '$valor_campo_buscar'";
			/*return array("1",$sql,$array_imagen);
			exit();*/
			$gsent = Conexion::getInstance()->getDb()->prepare($sql);
			$gsent->execute();
			$resultado = $gsent->fetchAll(PDO::FETCH_COLUMN, 0);
			if (isset($resultado[0]) && $resultado[0]!="") {
				return array("1",$resultado[0],$sql);
			}else{
				return array("0",$sql,$resultado,$sql);
			}
			
		}
		
		public static function encriptar_datos($datos, $key){
		}
		public static function insertar_generica($array_values){
			$tabla = "";
			$elcodigo = "";
	 		$values = "";
	 		$llaves = "";
			$as =0;
	 		foreach(array_keys($array_values) as $key ) {
	 			$as++;
	 			if ($key === 'table') {
	 				$tabla = $array_values[$key];
	 			} 
	 			if ($as>1) {
	 				$llaves.=$key;
					$values.="'".$array_values[$key]."'";
					if ($as <count($array_values)) {
							$values.=",";
							$llaves.=",";
					}
				}
				if($key==='codigo'){
					$elcodigo=$array_values[$key];
				}
	 		}
			$sql ="INSERT INTO $tabla($llaves)values($values)";;
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		return array("1",$elcodigo,"Insertado",$sql);
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}

		//insert into table ()values()
		//update table set campo = value()
		public static function actualizar_generica($array_values){
			//preparo variables
			$tabla = "";
			$elcodigo = "";
			$wherid="";
	 		$valor_whereid="";
	 		$values = "";
	 		$llaves = "";
	 		$sentencia_update = "";
	 		$as =0;
			$agregando_as="";
			foreach(array_keys($array_values) as $key ) {//recorro el array que me envia mi json
	 			$as++;
	 			if ($key === 'table') {//obtengo tabla
	 				$tabla = $array_values[$key];
	 			}else if ($as===2) {//obtengo id para update
	 				$valor_whereid = $array_values[$key];
	 				$wherid= $key;
	 			} 
	 			else if ($as>2) {//creo los set
	 				$llaves.=$key;
					$values.="'".$array_values[$key]."'";
					$sentencia_update.= $key.'='."'".$array_values[$key]."'";
					if ($as <count($array_values)) {
							$values.=",";
							$llaves.=",";
							$sentencia_update.=',';
					}
					$agregando_as.=$as;
				}if($key==='codigo'){
					$elcodigo=$array_values[$key];
				}
	 		}

	 		$sql ="UPDATE $tabla SET $sentencia_update WHERE $wherid = '$valor_whereid'";//String de update creada
	 		/*return array("1","2",$sql,$as,$agregando_as);
	 		exit();*/
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);//ejecutro la actualización
	       		$comando->execute();
	       		$cuantos = $comando->rowCount();
	       		return array("1",$elcodigo,array("Actualizado",$sql),"",$cuantos);//retorno en caso de exito 
				//echo json_encode(array("exito" => $exito));
			} catch (Exception $e) {
				return array("0","Error al actualizar",$e->getMessage(),$e->getLine(),$sql);//retorno mensajes en caso de error
			}
		}

		public static function eliminar_generica($array_values){
			$tabla = $valor_campo=$campo="";
			$as=0;
			foreach(array_keys($array_values) as $key ) {
				$as++;
	 			if ($key === 'table') {//obtengo tabla
	 				$tabla = $array_values[$key];
	 			}else if ($as === 2) {//obtengo id para update
	 				$valor_campo = $array_values[$key];
	 				$campo= $key;
	 			} 
			}

			$sql = "DELETE FROM $tabla WHERE $campo = '$valor_campo'";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	            $comando->execute();
	            $afectados = $comando->rowCount();
	            return array("1","Eliminado","","",$afectados);
	        }catch(Exception $e){
	        	return array("0","Error al eliminar",$e->getMessage(),$e->getLine(),$sql);
	        	exit();
	        }
		}

		/***/
		//
		//emailte: valor del campo puede ser telefono o correo 
		//valor_delcampo: es el valor a buscar
		//tabla: el nombre de la tabla
		//quees: si es un insert o un update
		//valor_antiguo: si es una actualizacion sera el campo anterior, si es un insert sera 0
		public static function validar($emailte,$valor_delcampo,$tabla,$quees,$valor_antiguo){
			$campo = "";
			if ($emailte == "email" || $emailte =="correo") {
				$campo = ($emailte=="email") ? $emailte : "correo";
			}else{
				$campo = ($emailte=="telefono") ? $emailte : "telefono_movil";
			}

			$campo_sacado="";
			$sql = ($quees ==1) ? "SELECT $campo from $tabla WHERE $campo = '$valor_delcampo'" : "SELECT $campo from $tabla WHERE $campo = '$valor_delcampo' AND $campo <> '$valor_antiguo'";
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	            $comando->execute();

	            while ($row = $comando->fetch(PDO::FETCH_ASSOC)) {
	                $campo_sacado = $row[$campo];
            	}
            	if($cuenta = $comando->rowCount()>0){
            		return array("1",$campo_sacado,$sql);
					exit();
            	}else{
            		return array("2",$campo_sacado,$sql);
					exit();
            	}
				
				
			} catch (Exception $e) {
				return array("-1",$e->getMessage(),$e->getLine(),$sql);
				exit();
			}

		}

		public static function generarpass(){
		    $cadena_base =  'abcdefghijklmnopqrstuvwxyz';
		    $cadena_base .= '0123456789' ;
		    //$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
		    $cadena_base .= '';
			$password = '';
			$limite = strlen($cadena_base) - 1;
			$largo = 8;
			for ($i=0; $i < $largo; $i++)
			$password .= $cadena_base[rand(0, $limite)];

			return $password;
		}
		
		public static function generartoken(){
		    $cadena_base .= '0123456789' ;
		    //$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
		    $cadena_base .= '';
			$password = '';
			$limite = strlen($cadena_base) - 1;
			$largo = 6;
			for ($i=0; $i < $largo; $i++)
			$password .= $cadena_base[rand(0, $limite)];

			return $password;
		}


		public static function encriptar_password($password){

			$sql ="SELECT PASSWORD('$password') as password";
			$password_encriptado=null;
			$comando=Conexion::getInstance()->getDb()->prepare($sql);
			$comando->execute();
			while($row=$comando->fetch(PDO::FETCH_ASSOC)){
				$password_encriptado=$row['password'];
			}
			return $password_encriptado;

		}

		public static function crear_select($array,$difente="",$igual="",$el_seleccione=""){
			$as = 0;
			$tabla= $campo = "";

			if (count($array)==3) {
				foreach(array_keys($array) as $key ) {
					$as++;
					if ($key === 'table') {//obtengo tabla
		 				$tabla = $array[$key];
		 			}else if ($as===2) {//obtengo tabla
		 				$campo1 = $key;
		 				$campo2 = $array[$key];
		 			}else if ($as===3) {//obtengo tabla
		 				$campoj1 = $key;
		 				$campoj2 = $array[$key];
		 			}else if ($as===4) {//obtengo tabla
		 				$valor_whereid = $array[$key];
	 					$wherid= $key;
		 			}
				}

				$sql = "SELECT $campoj1,$campoj2 FROM $tabla $difente"; 
			}else{
				
				foreach(array_keys($array) as $key ) {
					$as++;
					if ($key === 'table') {//obtengo tabla
		 				$tabla = $array[$key];
		 			}else if ($as===2) {//obtengo tabla
		 				$campo1 = $key;
		 				$campo2 = $array[$key];
		 			}
				}

				$sql = "SELECT $campo1,$campo2 FROM $tabla $difente";
			}
			try {
				$comando = Conexion::getInstance()->getDb()->prepare($sql);
	       		$comando->execute();
	       		$resultado = $comando->fetchAll();
			   	//$option_devolver ="<option value=''></option>";//chosen select
			   	$option_devolver = ($el_seleccione!="") ? "<option value='-1'>Seleccione</option>":"<option>Seleccione</option>";//select 2
			    $data_selected = "";
			    foreach ($resultado as $row) {
			    	$as++;
			    	$nombre = mb_strtoupper($row[$campo2], 'UTF-8');
			    	$selected = "";
			    	if($row[$campo1]==$igual){
			    		$selected = "selected";
			    	}
			        $option_devolver .="<option value='".$row[$campo1]."' $selected>".$nombre."</option>";
			    }
			    $option_retornar =($option_devolver !="") ? $option_devolver : "<option value='-1'>No existen datos registrados</option>";
			    
	       		return array($option_retornar,$data_selected,$sql,$option_devolver,$resultado);
				
			} catch (Exception $e) {
				return array("0","error",$e->getMessage(),$e->getLine(),$sql);
	            //echo json_encode(array("error" => $error));
			}
		}
		public static function formatear_fecha($fecha){
			$pos = strpos($fecha, "/");
			if ($pos === false) $fecha = explode("-",$fecha);
			else $fecha = explode("/",$fecha);
			$dia1 = (strlen($fecha[0])==1) ? '0'.$fecha[0] : $fecha[0];
			$fecha1 = $fecha[2].'-'.$fecha[1].'-'.$dia1;
	        return $fecha1;
		}


	 
	



		/***encripto password*/
		public static function encriptarlas_contrasenas($contra){
			$contra_encrip = password_hash($contra, PASSWORD_DEFAULT);
			return $contra_encrip;
		}

		/***comparo password*/
		public static function desencrilas_contrasena($contra_usuario,$contra_bd){
			if (password_verify($contra_usuario, $contra_bd)) {
			    return array(1,"coincide el hash");
			}else {
			    return array(-1,"no coincide el hash");
			}

		}

		/***consulto usuario para retornar password y posteriormente consultarlo*/
		public static function consultar_usuairo($usuario){

			$query = "SELECT *FROM 
                    ".ESQUEMA.".tb_usuarios AS u 
                    JOIN ".ESQUEMA.".tb_persona as p ON p.id = u.id_persona
                WHERE (p.correo='$usuario' OR u.usuario='$usuario')";
        	$usuario_exist = Genericas2::get_query($query);
        	if ($usuario_exist[0]===1 && $usuario_exist[4]>=1) {
        		return array($usuario_exist[0],$usuario_exist[4],$usuario_exist[2][0]['contrasena'],$usuario_exist[2][0]['usuario'],$usuario_exist[2][0]['correo']);
        		exit();
        	}else{
        		return array("-1","error los datos no existen",$usuario_exist,$query);
        		exit();
        	}
		}

		public static function envio_correo($para,$titulo,$mensaje){

			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'To: Ele <info@gmail.com>' . "\r\n";
			$cabeceras .= 'From: Recuperación de Contraseña <info@gmail.com>' . "\r\n";

			// Enviarlo
			if (mail($para, $titulo, $mensaje, $cabeceras)) {
				return array(1,"Exito al enviar el mail");
			}else{
				return array(-1,"Error al enviar el mail");
			}
		}


		public static function plantilla($contrasena){
			return '<!DOCTYPE html>

			<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
			<head>
			<title></title>
			<meta charset="utf-8"/>
			<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
			<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
			<style>
					* {
						box-sizing: border-box;
					}

					body {
						margin: 0;
						padding: 0;
					}

					th.column {
						padding: 0
					}

					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: inherit !important;
					}

					#MessageViewBody a {
						color: inherit;
						text-decoration: none;
					}

					p {
						line-height: inherit
					}

					@media (max-width:520px) {
						.icons-inner {
							text-align: center;
						}

						.icons-inner td {
							margin: 0 auto;
						}

						.row-content {
							width: 100% !important;
						}

						.stack .column {
							width: 100%;
							display: block;
						}
					}
				</style>
			</head>
			<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
			<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="500">
			<tbody>
			<tr>
			<th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
			<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
			<tr>
			<td>
			<div style="font-family: sans-serif">
			<div style="font-size: 14px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
			<p style="margin: 0; font-size: 14px; text-align: center;"><strong>Recuperación de Contraseña</strong></p>
			<p style="margin: 0; font-size: 14px; text-align: center;"><strong>Curso de Programación PHP 2021</strong></p>
			</div>
			</div>
			</td>
			</tr>
			</table>
			</th>
			</tr>
			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="500">
			<tbody>
			<tr>
			<th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
			<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
			<tr>
			<td>
			<div style="font-family: sans-serif">
			<div style="font-size: 14px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
			<p style="margin: 0; font-size: 14px;">Para ingresar al sistema utilice la siguiente :</p>
			</div>
			</div>
			</td>
			</tr>
			</table>
			<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
			<tr>
			<td>
			<div style="font-family: sans-serif">
			<div style="font-size: 12px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
			<p style="margin: 0; font-size: 12px;">'.$contrasena.'</p>
			</div>
			</div>
			</td>
			</tr>
			</table>
			</th>
			</tr>
			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
			<tbody>
			<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="500">
			<tbody>
			<tr>
			<th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
			<table border="0" cellpadding="0" cellspacing="0" class="icons_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
			<tr>
			<td style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center;">
			<table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
			<tr>
			<td style="text-align:center;">
			<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
			<!--[if !vml]><!-->
			<table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
			<!--<![endif]-->
			<tr>
			<td style="text-align:center;padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:6px;"><a href="https://www.designedwithbee.com/"><img align="center" alt="Designed with BEE" class="icon" height="32" src="images/bee.png" style="display: block; height: auto; border: 0;" width="34"/></a></td>
			<td style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:15px;color:#9d9d9d;vertical-align:middle;letter-spacing:undefined;text-align:center;"><a href="https://www.designedwithbee.com/" style="color:#9d9d9d;text-decoration:none;">Elenilson</a></td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</th>
			</tr>
			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table><!-- End -->
			</body>
			</html>';
		}

	}

?>