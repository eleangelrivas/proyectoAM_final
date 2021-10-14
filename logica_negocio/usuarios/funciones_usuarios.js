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
        	cargar_datos();
        }).fail(function(){

        }).always(function(){

        });


	});
});

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