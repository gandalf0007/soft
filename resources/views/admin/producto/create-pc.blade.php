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

{!!Form::open(['url'=>'producto-combo-create', 'id'=>'form', 'method'=>'POST' , 'files'=>True ])!!}
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


<!-- /.el scrip que perimte los calculos se llama myajax.js -->


<script type="text/javascript">





</script>

@endsection
