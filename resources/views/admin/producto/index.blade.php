@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Productos</h3>

<div><br><a class="btn btn-success" href="{!! URL::to('producto/create') !!}">
  <i class="fa fa-shopping-basket fa-lg"></i> Nuevo Producto</a></div>

            </div>
			<div class="box-body">


<!--buscador-->
{!!Form::open(['route'=>'producto.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
{!!Form::text('pro_codigo',null,['class'=>'form-control','placeholder'=>'Codigo'])!!}
{!!Form::text('pro_descrip',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador--> 




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
		<th class="col-md-4">Operaciones</th>
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

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $producto->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $producto->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $producto->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar Producto-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-producto')	
<!--modal de eliminar producto-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-producto')
<!--modal de ver producto-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-producto')

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