@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Categorias</h3>
@include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('categoria/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Categoria</a>

            </div>

            </div>
			<div class="box-body">



<table id="example2" class="table table-bordered table-hover">
	<thead>
      <tr>
    <th>Id</th>
		<th>Categoria</th>
		<th>Icono</th>
    <th>banner</th>
    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($categorias as $categoria)
    <tbody>
  <td>{{ $categoria -> id}}</td>
	<td>{{ $categoria -> nombre}}</td>
  <td><i class="icon fa fa-fw"><img src="storage/categorias/{{$categoria->icon}}"></i></td>
	<td><i class="icon fa fa-fw"><img src="storage/banner/{{$categoria->banner}}"  width="40" height="40"></i></td>  	

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $categoria->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $categoria->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $categoria->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar user-->
 @include('admin.categoria.modal.modal-edit-categoria')
<!--modal eliminar usuario-->
 @include('admin.categoria.modal.modal-delete-categoria')
 <!--modal ver usuario-->
 @include('admin.categoria.modal.modal-ver-categoria')

			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Sub-Categorias</h3>
@include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('categoriasub/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Sub-Categoria</a>

            </div>

            </div>
      <div class="box-body">



<table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>Sub-Categoria</th>
    <th>Categoria Padre</th>
    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($subcategorias as $subcategoria)
    <tbody>
      <td>{{ $subcategoria -> id}}</td>
      <td>{{ $subcategoria -> nombre}}</td>
      <td>{{ $subcategoria->categoria->nombre}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $subcategoria->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $subcategoria->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $subcategoria->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.categoria.modal.modal-edit-categoriasub')
<!--modal eliminar usuario-->
 @include('admin.categoria.modal.modal-delete-categoriasub')
 <!--modal ver usuario-->
 @include('admin.categoria.modal.modal-ver-categoriasub')


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