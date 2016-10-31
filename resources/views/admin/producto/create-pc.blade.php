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
@include('admin.producto.forms.formscreate-pc')
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



function calcular_descuento() {
  importe_total = 0
  $(".importe_linea").each(
    function(index, value) {
      importe_total = importe_total + eval($(this).val());
    }
  );

  $(".descuento").each(
    function(index, value) {
      var desc1 = document.getElementById("desc1");
      var div = document.getElementById("resultado");
      resultado = importe_total / parseFloat(desc1.value) ;
      
      $("#resultado").val(resultado);
    }
  );
  
  
}

</script>



@endsection
