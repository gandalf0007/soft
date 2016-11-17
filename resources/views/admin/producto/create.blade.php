@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Nuevo Producto</h3>
            </div>
			<div class="box-body">
@include('alerts.request')

{!!Form::open(['route'=>'producto.store', 'method'=>'POST' , 'files'=>True])!!}
@include('admin.producto.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- /.scrip para ahcer la suma de los productos atraves de la clase importe_linea -->
<script type="text/javascript">
function calcular_total() {
  importe_total = 0
  $(".importe_linea").each(
    function(index, value) {
      importe_total = importe_total + eval($(this).val());
    }
  );
  $("#total").val(importe_total);
}







function calcular_rentabilidad() {
  precio_costo = 0
  $(".precio_costo").each(
    function(index, value) {
      precio_costo = precio_costo + eval($(this).val());
    }
  );



$(".rentabilidad").each(
    function(index, value) {
      //si esta abilitado el check lo abilita
      if (document.getElementById('habilitado1').checked){
    var rentabilidad1 = document.getElementById("rentabilidad1");
      var resultado = document.getElementById("resultado");
      resultado = precio_costo * parseFloat(rentabilidad1.value) ;
      $("#resultado").val(resultado);
    }
    }
  );


$(".rentabilidad2").each(
    function(index, value) {
      //si esta abilitado el check lo abilita
      if (document.getElementById('habilitado1').checked){
      var rentabilidad2 = document.getElementById("rentabilidad2");
      var resultado2 = document.getElementById("resultado2");
      resultado2 = precio_costo * parseFloat(rentabilidad2.value) ;
      
      $("#resultado2").val(resultado2);
       }
    }
  );

  $(".rentabilidad3").each(
    function(index, value) {
      //si esta abilitado el check lo abilita
      if (document.getElementById('habilitado1').checked){
      var rentabilidad3 = document.getElementById("rentabilidad3");
      var resultado3 = document.getElementById("resultado3");
      resultado3 = precio_costo * parseFloat(rentabilidad3.value) ;
      
      $("#resultado3").val(resultado3);
       }
    }
  );
  

  
  
  
}

</script>

@endsection


