<?php 
	
	require_once("../../Conexion/Modelo.php");
	$modelo = new Modelo();
	if (isset($_POST['eliminar_persona']) && $_POST['eliminar_persona']=="si_eliminala") {
		$array_eliminar = array(
			"table"=>"tb_persona",
			"id"=>$_POST['id']

		);
		$resultado = $modelo->eliminar_generica($array_eliminar);
		if($resultado[0]=='1' && $resultado[4]>0){
        	print json_encode(array("Exito",$_POST,$resultado));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }
		


	}else if (isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_actualizalo") {
		$_POST['direccion'] = "Sin direccion";
		$array_update = array(
            "table" => "tb_persona",
            "id" => $_POST['llave_persona'],
            "dui"=>$_POST['dui'],
            "nombre" => $_POST['nombre'],
            "email" => $_POST['email'],
            "direccion" => $_POST['direccion'], 
            "telefono" => $_POST['telefono'],
            "fecha_nacimiento" => $modelo->formatear_fecha($_POST['fecha']), 
            "tipo_persona" => $_POST['tipo_persona']
        );
		$resultado = $modelo->actualizar_generica($array_update);

		if($resultado[0]=='1' && $resultado[4]>0){
        	print json_encode(array("Exito",$_POST,$resultado));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }


	}else if (isset($_POST['consultar_info']) && $_POST['consultar_info']=="si_condui_especifico") {

		$resultado = $modelo->get_todos("tb_persona","WHERE id = '".$_POST['id']."'");
		if($resultado[0]=='1'){
        	print json_encode(array("Exito",$_POST,$resultado[2][0]));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }



	}else if (isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_registro") {
		$_POST['direccion']="sna vicente";
		$id_insertar = $modelo->retonrar_id_insertar("tb_persona"); 
        $array_insertar = array(
            "table" => "tb_persona",
            "id"=>$id_insertar,
            "nombre" => $_POST['nombre'],
            "email" => $_POST['email'],
            "direccion" => $_POST['direccion'],
            "dui" => $_POST['dui'],
            "telefono" => $_POST['telefono'],
            "estado" => 1,
            "fecha_nacimiento" => $_POST['fecha'],
            "fecha_registro" => date("Y-m-d G:i:s"),
            "tipo_persona" => $_POST['tipo_persona']
        );
        $result = $modelo->insertar_generica($array_insertar);
        if($result[0]=='1'){
        	print json_encode(array("Exito",$_POST,$result));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result));
			exit();
        }
    
		 
	}else{
		$htmltr = $html="";
		$cuantos = 0;
		$sql = "SELECT *,(SELECT count(*) as cuantos FROM tb_persona) as cuantos FROM tb_persona";
		$result = $modelo->get_query($sql);
		if($result[0]=='1'){
			
			foreach ($result[2] as $row) {
				$cuantos = $row['cuantos'];
				$tipo = ($row['tipo_persona']==2) ? "Empleado": "Administrador"; 
				 $htmltr.='<tr>
	                            <td>'.$row['nombre'].'</td>
	                            <td>'.$row['dui'].'</td>
	                            <td>'.$row['telefono'].'</td>
	                            <td>'.$row['email'].'</td>
	                            <td>'.$modelo->formatear_fecha($row['fecha_nacimiento']).'</td>
	                            <td>'.$tipo.'</td>
	                            <td>
	                            	<div class="dropdown m-b-10">
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a data-id="'.$row['id'].'" class="dropdown-item btn_editar" href="javascript:void(0)">Editar</a>
                                            <a data-id="'.$row['id'].'" class="dropdown-item btn_eliminar" href="javascript:void(0)">Eliminar</a>
                                            <a data-id="'.$row['id'].'" class="dropdown-item btn_recuperar_pass" href="javascript:void(0)">Recuperar Contraseña</a>
                                        </div>
                                    </div>

	                            </td>
	                        </tr>';	
			}
			$html.='<table id="tabla_usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DUI</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Fecha nacimiento</th>
                            <th>Tipo persona</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            $html.=$htmltr;
			$html.='</tbody>
                    	</table>';


        	print json_encode(array("Exito",$html,$cuantos,$_POST,$result));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result));
			exit();
        }
	}

?>