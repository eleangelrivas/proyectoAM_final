$(function(){
	console.log("todo esta integrado");

	$("#formulario_login").submit(function (event){
		event.preventDefault();
		var datos = $("#formulario_login").serialize();
		console.log("evento submit",datos);
	});
})