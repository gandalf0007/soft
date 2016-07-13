@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->
<section class="content">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Configuracion del logo</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
            @if(empty(DB::table('web_logos')->get()))
              <a class="btn btn-success   " href="{!! URL::to('logo/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Logo</a>
            @endif
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>Logo</th>
    <th>Imagen</th>
    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($logos as $logo)
    <tbody>
  <td>{{ $logo -> id}}</td>
  <td>{{ $logo -> logo}}</td>
  <td><i class="icon fa fa-fw"><img src="storage/paginas/home/logo/{{$logo->logo}}"  width="40" height="40"></i></td> 

  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $logo->id }}"><i class="fa fa-edit"> Editar</i></button>
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $logo->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal editar user-->
 @include('admin.partials.modal.web.modal-edit-logo')
<!--modal eliminar usuario-->
 @include('admin.partials.modal.web.modal-delete-logo')


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