@extends('layouts.app')
@section('content')

<section class="content">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion de Puntos</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
            @if(empty(DB::table('puntos')->get()))
              <a class="btn btn-success   " href="{!! URL::to('puntos/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Porcentaje</a>
            @endif
            </div>
            </div>

  <div class="form-horizontal">
  {!!Form::label('El Usuario gana el porcentaje del total de la venta ')!!}
 
</div>          

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>Porcentaje (%)</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($puntos as $punto)
    <tbody>
  <td>{{ $punto -> id}}</td>
  <td>{{ $punto -> porcentaje}}</td>


  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $punto->id }}"><i class="fa fa-edit"> Editar</i></button>
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $punto->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.puntos.modal.modal-edit-puntos')
<!--modal eliminar usuario-->
 @include('admin.puntos.modal.modal-delete-puntos')


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




  <section class="content">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Asignar Puntos</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
            @if(empty(DB::table('puntos')->get()))
              <a class="btn btn-success   " href="{!! URL::to('puntos/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Porcentaje</a>
            @endif
            </div>


        <a class="btn btn-success" href="{!! URL::to('puntos-seleccionar-usuario') !!}">
  <i class="fa fa-desktop fa-lg"></i> Selecionar Usuario</a>

            </div>

  <div class="form-horizontal">
 
</div>          
@if(count($user))
<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Direccion</th>
    <th>Puntos</th>
    <th>Agregar</th>
  </thead>
  
  <tbody>
  <!-- -->
  <td>{{ $user -> nombre}}</td>
  <td>{{ $user -> email}}</td>
  <td>{{ $user -> telefono}}</td>
  <td>{{ $user -> direccion}}</td>
  <td>{{ $user -> puntos}}</td>


  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Agregar-{{ $user->id }}"><i class="fa fa-edit"> Agregar</i></button>
</td>

  </tbody>
 @endif
  </table>

<!--modal editar user-->
 @include('admin.puntos.modal.modal-agregar-puntos')
<!--modal eliminar usuario-->
 @include('admin.puntos.modal.modal-delete-puntos')


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