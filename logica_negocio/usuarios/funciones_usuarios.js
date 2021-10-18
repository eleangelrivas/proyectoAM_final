$(function (){
	$('#formulario_registro').parsley();

	$.mask.definitions['~']='[2,6,7]';
	$('#telefono').mask("~999-9999");
	$('#dui').mask("99999999-9");

	var fecha_hoy = new Date(); 
	$('#fecha').datepicker({
	    format: "dd/mm/yyyy",
	    todayBtn: true,
	    clearBtn: false,
	    language: "es",
	    calendarWeeks: true,
	    autoclose: true,
	    todayHighlight: true,
	    endDate:fecha_hoy
	});
	cargar_datos();
	// $(".select2").select2();
	$(document).on("blur",".validar_campos_unicos",function(e){
		e.preventDefault();
		if ($(this).val()=="") {
			return;
		}
		console.log("validar_campo",$(this).data('quien_es'));
		mostrar_mensaje("Espere","Validando "+$(this).data('quien_es'));
		var datos = {"validar_campos":"si_por_campo","campo":$(this).val(),"tipo":$(this).data('quien_es')};

		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("retorno de validacion",json);
	    	if (json[0]=="Exito") {
	    		 
	    	}
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });



	});
	$(document).on("change","#imagen_persona",function(e){
		validar_archivo($(this));

	});
	$(document).on("change","#depto",function(e){
		e.preventDefault();
		console.log("el depto es: ",$("#depto").val());

		mostrar_mensaje("Espere","Consultando municipios");
		e.preventDefault();
		var datos = {"consultar_municipios":"si_pordeptos","depto":$("#depto").val()}
		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	if (json[0]=="Exito") {
	    		$("#municipio").empty().html(json[1][0]);
	    	}
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });



	});

	$(document).on("click",".btn_recuperar_pass",function(e){
		mostrar_cargando("Espere","Enviando contraseña");
		e.preventDefault();
		var datos = {"enviar_contra":"si_enviala","email":$(this).attr('data-email'),"id":$(this).attr('data-id')}
		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });

	});

	
	$(document).on("click",".btn_cerrar_class",function(e){
		e.preventDefault();
		$("#formulario_registro").trigger('reset');
		$('#md_registrar_usuario').modal('hide');


	});
	$(document).on("click",".btn_eliminar",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var datos = {"eliminar_persona":"si_eliminala","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	cargar_datos();

	    });
	});
	$(document).on("click",".btn_editar",function(e){

		e.preventDefault(); 
		mostrar_mensaje("Consultando datos");
		var id = $(this).attr("data-id");
		console.log("El id es: ",id);
		var datos = {"consultar_info":"si_condui_especifico","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {
	    		var fecHA_string = json[2]['fecha_nacimiento'];
				var porciones = fecHA_string.split('-');
				var fecha = porciones[2]+"/"+porciones[1]+"/"+porciones[0]

	    		$('#llave_persona').val(id);
	    		$('#ingreso_datos').val("si_actualizalo");
	    		$('#nombre').val(json[2]['nombre']);
	    		$('#email').val(json[2]['email']);
	    		$('#dui').val(json[2]['dui']);
	    		$('#telefono').val(json[2]['telefono']);
	    		$('#fecha').val(fecha);
	    		$('#tipo_persona').val(json[2]['tipo_persona']);

	    		$("#usuario").removeAttr("required");
	    		$("#contrasenia").removeAttr("required");
	    		
				
	    		$('#md_registrar_usuario').modal('show');
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){
	    	Swal.close();
	    });


	});



	$(document).on("click","#registrar_usuario",function(e){
		e.preventDefault();
		console.log("Capturando evento");
		//$('#myModal').modal('show'); para abrir modal
		//$('#myModal').modal('hide'); para cerrar modal
		$('#md_registrar_usuario').modal('show');

		$(".select2").select2({
	    }).on("select2:opening", 
	        function(){
	            $(".modal").removeAttr("tabindex", "-1");
	    }).on("select2:close", 
	        function(){ 
	            $(".modal").attr("tabindex", "-1");
	    });
    
	});


	$(document).on("submit","#formulario_registro",function(e){
		e.preventDefault();
		var datos = $("#formulario_registro").serialize();
		console.log("Imprimiendo datos: ",datos);
		mostrar_mensaje("Almacenando información","Por favor no recargue la página");
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'json_usuarios.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);
        	$('#md_registrar_usuario').modal('hide');
        	if (json[0]=="Exito") {
        		if ($("#imagen_persona").val()!="") { 
        			subir_archivo($("#imagen_persona"),json[1]);
        		}
        		cargar_datos();
        	}else{
        		cargar_datos();
        	}
        	
        }).fail(function(){

        }).always(function(){

        });


	});
});

function subir_archivo(archivo,id_persona){

	Swal.fire({
      title: '¡Subiendo imagen!',
      html: 'Por favor espere mientras se sube el archivo',
      timerProgressBar: true,
      allowEscapeKey:false,
      allowOutsideClick:false,
      onBeforeOpen: () => {
        Swal.showLoading()
      }
  	});

  console.log("aca archivos",archivo,id_persona);
  // return null;
    var file =archivo.files;
    var formData = new FormData();
    formData.append('formData', $("#crear_seccion_home"));
    var data = new FormData();
     //Append files infos
     jQuery.each(archivo[0].files, function(i, file) {
        data.append('file-'+i, file);
     });

     console.log("data",data);
     $.ajax({  
        url: "json_usuarios.php?id="+id_persona+'&subir_imagen=subir_imagen_ajax',  
        type: "POST", 
        dataType: "json",  
        data: data,  
        cache: false,
        processData: false,  
        contentType: false, 
        context: this,

        success: function (json) {
	          Swal.close();
	            console.log("eljson_img",json);
	            

	        if(json[0]=="Exito"){  
	             Swal.fire(
		          '¡Excelente!',
		          'La información ha sido almacenada correctamente!',
		          'success'
	        	);
        	  
            }else{
                Swal.fire(
		          '¡Error!',
		          'No ha sido posible registrar la imagen',
		          'error'
		        );
            }

        }
    });
}


function cargar_datos(){
	mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'json_usuarios.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#datos_tabla").empty().html(json[1]);
    	$("#cantidad_usuarios").empty().html(json[2]);
    	$('#tabla_usuarios').DataTable();
    	$('#md_registrar_usuario').modal('hide');

    	$("#depto").empty().html(json[3][0]);
    }).fail(function(){

    }).always(function(){
    	Swal.close();
    });
}

function mostrar_mensaje(titulo,mensaje=""){
	Swal.fire({
	  title: titulo,
	  html: mensaje,
	  allowOutsideClick: false,
	  timerProgressBar: true,
	  didOpen: () => {
	    Swal.showLoading()
	     
	  },
	  willClose: () => {
	     
	  }
	}).then((result) => {
	  
	   
	})
}


function validar_archivo(file){
	console.log("validar_archivo",file);
	 
     var Lector;
     var Archivos = file[0].files;
     var archivo = file;
     var archivo2 = file.val();
     if (Archivos.length > 0) {


        Lector = new FileReader();
        Lector.onloadend = function(e) {
            var origen, tipo, tamanio;
            //Envia la imagen a la pantalla
            origen = e.target; //objeto FileReader
            //Prepara la información sobre la imagen

            tipo = archivo2.substring(archivo2.lastIndexOf("."));
            console.log("el tipo",tipo);
            tamanio = e.total / 1024;
            console.log("el tamaño",tamanio);

            if (tipo !== ".jpeg" && tipo !== ".JPEG" && tipo !== ".jpg" && tipo !== ".JPG" && tipo !== ".png" && tipo !== ".PNG") {
                //  
                console.log("error_tipo");
                $("#error_en_la_imagen").css('display','block');
            }
            else{
                 $("#error_en_la_imagen").css('display','none');
                console.log("en el else");
            }

       };
        Lector.onerror = function(e) {
        console.log(e)
       }
       Lector.readAsDataURL(Archivos[0]);
   }



}