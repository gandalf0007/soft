$(document).ready(function(){

//token
  $.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


//al presionar el link o boton con id calcularTotal se ejecuta esto para calcular el total 
  $('#calcularTotal').click(function(){
    var token = $("#token").val();

    var gabinete = parseInt($('#gabinete').val());
    var mother = parseInt($('#mother').val());
    var procesador = parseInt($('#procesador').val());
    var mouse = parseInt($('#mouse').val());
    var teclado = parseInt($('#teclado').val());
    var video = parseInt($('#video').val());
    var fuente = parseInt($('#fuente').val());
    var disco = parseInt($('#disco').val());
    var memoria = parseInt($('#memoria').val());

    //hace referencia a la ruta , y le mandos los parametros
  $.get('producto-calcular/'+ gabinete +'/'+mother+'/'+procesador+'/'+mouse+'/'+teclado+'/'+video+'/'+fuente+'/'+disco+'/'+memoria, function(data){
  //me lo muesta en el input que tenga id mostrar
    $("#total").val(data);
});

  });//end calcularTotal


});//end document











function calcular_descuento() {
//al presionar el link o boton con id calcularTotal se ejecuta esto para calcular el total 
  $(".descuento").each(
    function(index, value) {

    var token = $("#token").val();

    var gabinete = parseInt($('#gabinete').val());
    var mother = parseInt($('#mother').val());
    var procesador = parseInt($('#procesador').val());
    var mouse = parseInt($('#mouse').val());
    var teclado = parseInt($('#teclado').val());
    var video = parseInt($('#video').val());
    var fuente = parseInt($('#fuente').val());
    var disco = parseInt($('#disco').val());
    var memoria = parseInt($('#memoria').val());

    //hace referencia a la ruta , y le mandos los parametros
  $.get('producto-calcular/'+ gabinete +'/'+mother+'/'+procesador+'/'+mouse+'/'+teclado+'/'+video+'/'+fuente+'/'+disco+'/'+memoria, function(data){
  //me lo muesta en el input que tenga id mostrar
    

    
      var desc1 = document.getElementById("desc1");
      var div = document.getElementById("resultado");
      resultado = data / parseFloat(desc1.value) ;
      
      $("#resultado").val(resultado);
    });//end $.Get


});
}//end calcular_descuento



