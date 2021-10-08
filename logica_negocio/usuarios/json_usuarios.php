<?php 
	
	require_once("../../Conexion/Modelo.php");
	$modelo = new Modelo();
	if (isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_registro") {
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
	                            <td>'.$row['fecha_nacimiento'].'</td>
	                            <td>'.$tipo.'</td>
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