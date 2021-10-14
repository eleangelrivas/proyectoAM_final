$(function(){
	console.log("todo esta integrado");
	$("#dui").mask("99999999-9");
 	

	$(document).on("submit","#actualizar_pass",function(event){
		event.preventDefault();
		if ($("#contrasena").val() != $("#recontrasena").val()) {

 			Swal.fire({
			  icon: 'error',
			  title: "Oops",
			  html:'Las contraseñas no coinciden'
			});
			return;
 		}
		mostrar_mensaje("Procesando solicitud","Por favor espere mientras se actualiza su contraseña");
		var datos = $("#actualizar_pass").serialize();
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_ingreso.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("actualizar pass",json);
	    	if (json[0]=="Exito") {
	    		Swal.close();
	    		Swal.fire({
				  icon: 'success',
				  title: "Su contraseña se ha actualizado",
				  html:"Espere mientras se redirige al login"
				});
				var timer = setInterval(function(){
					$(location).attr('href','index.php?modulo=Home');
					clearTimeout(timer); 
				},3500)
	    	}
	    }).always(function(){
	    	
	    })

	});
 	$(document).on("submit","#validar_dui",function(event){
 		event.preventDefault();

 		mostrar_mensaje("Procesando solicitud","Por favor no recargue la pantalla");
 		var datos = $("#validar_dui").serialize();
 		console.log("datos enviados: ",datos);
 		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_ingreso.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("Dui VALIDADO",json);
	    	if (json[0]=="Exito") {
	    		$("#id_persona").val(json[2]);
	    		//$("#actualizar_pass").css("display","block");
	    		$("#validar_dui").removeClass("mostrar").addClass("hiden");
	    		$("#actualizar_pass").removeClass("hiden").addClass("mostrar");

	    	}else{
	    		Swal.fire({
				  icon: 'error',
				  title: "El DUI ingresado no existe"
				});
				

	    	}

	    }).always(function(){
	    	Swal.close();
	    });


 	});
	$(document).on("submit","#formulario_desbloqueo1",function(event){
		event.preventDefault();
		var datos = $("#formulario_desbloqueo1").serialize();
		console.log("formulario desbloqueo",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_ingreso.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log(" desbloqueo",json);
	    	if (json[0]=="Exito") {
	    	 	
				Swal.fire({
				  icon: 'success',
				  title: json[1]
				});
				var timer = setInterval(function(){
					$(location).attr('href','../home/index.php?modulo=Home');
					clearTimeout(timer); 
				},3500)
	    	 }else{
	    	 	Swal.fire({
				  icon: 'error',
				  title: json[1]
				});
	    	 }

	    });
	});
	$(document).on("submit","#formulario_login",function(event){
		event.preventDefault();
		var datos = $("#formulario_login").serialize();
		console.log("evento submit",datos); 
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_ingreso.php',
	        data : datos,
	    }).done(function(json) {
	    	 console.log("el login: ",json);
	    	 if (json[0]=="Exito") {
	    	 	
				Swal.fire({
				  icon: 'success',
				  title: json[1]
				});
				var timer = setInterval(function(){
					$(location).attr('href','../home/index.php?modulo=Home');
					clearTimeout(timer);
				},3500)
	    	 }else if(json[0]=="Bloqueo"){
	    	 	Swal.fire({
				  icon: 'error',
				  title: "Usuario bloqueado"
				});
				var timer = setInterval(function(){
					$(location).attr('href','../home/index.php?modulo=Home');
					clearTimeout(timer);
				},3500)
	    	 }else{
	    	 	Swal.fire({
				  icon: 'error',
				  title: json[1]
				});
	    	 }

	    });


	});
})


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