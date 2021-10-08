$(function (){

	$(".select2").select2();
	$(document).on("click","#registrar_usuario",function(e){
		e.preventDefault();
		console.log("Capturando evento");
		//$('#myModal').modal('show'); para abrir modal
		//$('#myModal').modal('hide'); para cerrar modal
		$('#md_registrar_usuario').modal('show');



	})
})