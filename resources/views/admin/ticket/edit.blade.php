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
<img src="../../{{$producto->imagen1}}" class="user-image center-block" alt="" height="100" width="100" >

</div>
</div>
</div>


@include('admin.producto.forms.formsedit')


{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<a class="btn btn-primary pull-left" href="{!! URL::to('producto') !!}">
  <i class="fa fa-backward fa-lg"></i> Back</a>
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