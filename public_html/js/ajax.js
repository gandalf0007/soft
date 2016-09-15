$(document).ready(function(){
var.TablaDatos = $("#datos");
var route ="http://localhost/soft/public/rubro";

$.get(route , function(res){
		$(res).each(function(key,value){
			TablaDatos.append("<tr><td>"+value.rubros+"</td><td>");
		});
	});
});


function Carga(){
	var TablaDatos = $("#datos");
	var route = "http://localhost/soft/public/rubro";

	$("#datos").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			TablaDatos.append("<tr><td>"+value.genero+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-prymary' data-toggle='modal' data-target='#myModal'>Editar</button><button value="+value.id+" OnClick='Elimianr(this);' class='btn btn-prymary' >eliminar</button></td></tr> ")
		})
	})

}


function Eliminar(btn){
	var route =	"/rubro/"+btn.value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			carga();
			$("#msj-success").fadeIn();
		}
	});
}