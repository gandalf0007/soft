@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->
<section class="content">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion Del Carrucel</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('carrucel/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Imagen</a>
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
	<thead>
      <tr>
    <th>Id</th>
		<th>Imagen</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($imagenes as $imagen)
    <tbody>
  <td>{{ $imagen -> id}}</td>
	<td><i class="icon fa fa-fw"><img src="storage/paginas/home/carrucel/{{$imagen->imagen}}"  width="40" height="40"></i></td>  

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $imagen->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $imagen->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar user-->
 @include('admin.paginas.home.carrucel.modal.modal-edit-carrucel')
<!--modal eliminar usuario-->
 @include('admin.paginas.home.carrucel.modal.modal-delete-carrucel')


			           </div>
                <!-- /.box-body -->
              </div>
               <!-- /.col -->
            </div>
          <!-- /.row -->
         </div> 
          <!-- /.panel-body -->
       </div>
       <!-- /.anel panel-default -->



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion Del Carrucel de Marcas</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('carrucelmarcas/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Imagen</a>
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>Imagen</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($imagenesMarcas as $imagenesMarca)
    <tbody>
  <td>{{ $imagenesMarca -> id}}</td>
  <td><i class="icon fa fa-fw"><img src="storage/paginas/home/marcas/{{$imagenesMarca->imagen}}"  width="40" height="40"></i></td>  

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $imagenesMarca->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $imagenesMarca->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.paginas.home.marcas.modal.modal-edit-marcas')
<!--modal eliminar usuario-->
 @include('admin.paginas.home.marcas.modal.modal-delete-marcas')


                 </div>
                <!-- /.box-body -->
              </div>
               <!-- /.col -->
            </div>
          <!-- /.row -->
         </div> 
          <!-- /.panel-body -->
       </div>
       <!-- /.anel panel-default -->




<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion Del Carrucel de Marcas</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('carrucelmarcas/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Imagen</a>
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>Imagen</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($imagenesMarcas as $imagenesMarca)
    <tbody>
  <td>{{ $imagenesMarca -> id}}</td>
  <td><i class="icon fa fa-fw"><img src="storage/paginas/home/marcas/{{$imagenesMarca->imagen}}"  width="40" height="40"></i></td>  

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $imagenesMarca->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $imagenesMarca->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.partials.modal.web.modal-edit-marcas')
<!--modal eliminar usuario-->
 @include('admin.partials.modal.web.modal-delete-marcas')


                 </div>
                <!-- /.box-body -->
              </div>
               <!-- /.col -->
            </div>
          <!-- /.row -->
         </div> 
          <!-- /.panel-body -->
       </div>
       <!-- /.anel panel-default -->

    </section>
@endsection