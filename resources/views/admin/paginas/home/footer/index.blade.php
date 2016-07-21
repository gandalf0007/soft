@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->
<section class="content">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion Footer Informacion</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
            @if(empty(DB::table('web_informacions')->get()))
              <a class="btn btn-success   " href="{!! URL::to('informacion/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Informacion</a>
            @endif
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>direccion1</th>
    <th>direccion2</th>
    <th>direccion3</th>
    <th>telefono1</th>
    <th>telefono2</th>
    <th>telefono3</th>
    <th>correo1</th>
    <th>correo2</th>
    <th>correo3</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($informacions as $informacion)
    <tbody>
  <td>{{ $informacion -> id}}</td>
  <td>{{ $informacion -> direccion1}}</td>
  <td>{{ $informacion -> direccion2}}</td>
  <td>{{ $informacion -> direccion3}}</td>
  <td>{{ $informacion -> telefono1}}</td>
  <td>{{ $informacion -> telefono2}}</td>
  <td>{{ $informacion -> telefono3}}</td>
  <td>{{ $informacion -> correo1}}</td>
  <td>{{ $informacion -> correo2}}</td>
  <td>{{ $informacion -> correo3}}</td>

  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $informacion->id }}"><i class="fa fa-edit"> Editar</i></button>
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $informacion->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.paginas.home.informacion.modal.modal-edit-informacion')
<!--modal eliminar usuario-->
 @include('admin.paginas.home.informacion.modal.modal-delete-informacion')


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
        <h3 class="panel-title">Configuracion Box Facebook</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
            @if(empty(DB::table('web_facebooks')->get()))
              <a class="btn btn-success   " href="{!! URL::to('facebook/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Box</a>
            @endif
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>link</th>

    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($boxs as $box)
    <tbody>
  <td>{{ $box -> id}}</td>
  <td>{{ $box -> box}}</td>


  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $box->id }}"><i class="fa fa-edit"> Editar</i></button>
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $box->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.paginas.home.facebook.modal.modal-edit-boxfacebook')
<!--modal eliminar usuario-->
 @include('admin.paginas.home.facebook.modal.modal-delete-boxfacebook')


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