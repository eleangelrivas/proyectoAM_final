$(function (){
	$('#formulario_registro').parsley();

	/*$('#telefono').inputmask({
		mask: '9999-9999',

	});*/


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

		$.ajax({
            dataType: "json",
            method: "POST",
            url:'json_usuarios.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);

        	cargar_datos();
        }).fail(function(){

        }).always(function(){

        });


	});
});

function cargar_datos(){
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

    });
}