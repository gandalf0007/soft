@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Usuarios</h3>
            </div>
			<div class="box-body">


<!--buscador-->
{!!Form::open(['route'=>'producto.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('pro_descrip',null,['class'=>'form-control','placeholder'=>'descripcion del prodcuto'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador--> 


<div><a class="btn btn-success  pull-right " href="{!! URL::to('producto/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Producto</a></div>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Imagen</th>
		<th>Descripcion</th>
		<th>Iva</th>
		<th>Costo</th>
		<th>venta</th>
		<th>venta 2</th>
		<th>Stock</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($productos as $producto)
	<tbody>
	<!-- -->
	<td>{{ $producto -> pro_codigo}}</td>
	<td><img src="storage/{{$producto->path}}" alt="" style="height:100px"></td>
  	<td>{{ $producto -> pro_descrip}}</td>
   	<td>{{ $producto -> iva_id}}</td>
  	<td>{{ $producto -> pro_preciocosto}}</td>
  	<td>{{ $producto -> pro_venta}}</td>
  	<td>{{ $producto -> pro_precio2}}</td>
  	<td>{{ $producto -> pro_stock_act}}</td>

 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

 <!--<td>{!! link_to_route('producto.edit', $title = 'editar', $parameters = $producto->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>-->

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $producto->id }}"><i class="fa fa-edit"> Editar</i></button>
</td>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['producto.destroy',$producto->id],'method'=>'DELETE'])!!}
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $producto->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
{!!Form::close()!!}</td>

@endif

	</tbody>
	@endforeach
	</table>

<!--modal editar Producto-->
 @include('admin.partials.modal.modal-edit-producto')	
<!--modal de eliminar producto-->
 @include('admin.partials.modal.modal-delete-producto')

<!--para renderizar la paginacion-->
  {!! $productos->render() !!}
 
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