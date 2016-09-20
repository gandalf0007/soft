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
@include('alerts.request')

<div><br><a class="btn btn-success" href="{!! URL::to('producto/create') !!}">
  <i class="fa fa-shopping-basket fa-lg"></i> Nuevo Producto</a></div>

            </div>
			<div class="box-body">
<ul class="nav nav-tabs">
  <li><a href="{{ url('producto') }}">Todos</a></li>
  <li><a href="{{ url('producto-oferta') }}">Oferta </a></li>
  <li><a href="{{ url('producto-stock-critico') }}">Stock Critico</a></li>
  <li class="active"><a href="{{ url('producto-desabilitado') }}">Desabilitados ({{$count}})</a></li>
</ul>

<!--buscador-->
{!!Form::open(['route'=>'producto.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo'])!!}
{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
 <button type="submit" class="fa  fa-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador--> 




<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Imagen</th>
		<th>Descripcion</th>
		<!--<th>Iva</th>-->
		<!--<th>Costo</th>-->
		<th>venta</th>
		<!--<th>venta 2</th>-->
		<th>Stock</th>
    
		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($productos as $producto)
	<tbody>
	<!-- -->
	<td>{{ $producto -> codigo}}</td>


  <!-- si es sin foto cargo la foto por defecto -->
  @if($producto->imagen1 == "sin-foto.jpg")
    <td><img src="storage/productos/{{$producto->imagen1}}" alt="" height="100" width="100" ></td>
     <!-- caso contrario cargo la foto -->
  @elseif($producto->imagen1 != "sin-foto.jpg")
    <td><img src="{{$producto->imagen1}}" alt="" height="100" width="100" ></td>
  @endif
	

  	<td>{{ $producto -> descripcion}}</td>
   	<!--<td>{{ $producto -> iva_id}}</td>-->
  	<!--<td>{{ $producto -> preciocosto}}</td>-->
  	<td>{{ $producto -> precioventa}}</td>
  	<!--<td>{{ $producto -> precio2}}</td>-->
  	<td>{{ $producto -> stockactual}}</td>

<td>
{!! link_to_route('producto.show', $title = 'Ver', $parameters = $producto->id  , $attributes = ['class'=>'btn btn-warning']); !!}

<a class="btn btn-success" href="{!! URL::to('producto-uploadimagen/'.$producto->id) !!}"><i class="fa "></i>fotos</a>


{!! link_to_route('producto.edit', $title = 'Editar', $parameters = $producto->id  , $attributes = ['class'=>'btn btn-primary']); !!}

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $producto->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>
@endforeach
	</tbody>
	
	</table>


<!--modal de eliminar producto-->
 @include('admin.producto.modal.modal-delete-producto')


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