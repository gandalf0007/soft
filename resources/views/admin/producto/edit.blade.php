@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Producto</h3>
            </div>
			<div class="box-body">




{!!Form::model($producto,['route'=>['producto.update',$producto->id],'method'=>'PUT' , 'files'=>True])!!}

  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Imagen de Portada</h3>
    </div>  
  <div class="panel-body">
<div class="row">
<!--imagen-->
{{ Html::image('storage/productos/' . $producto->imagen1 , 'img', array('class' => 'user-image center-block' , 'style'=>'height:100px')) }}

</div>
</div>
</div>


@include('admin.producto.forms.formscreate')


{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
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
@endsection