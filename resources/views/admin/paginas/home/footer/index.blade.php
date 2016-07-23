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

@foreach($informacions as $informacion)
{!!Form::model($informacion,['route'=>['informacion.update',$informacion->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">      
@include('admin.paginas.home.informacion.forms.formscreate')
</div>
<div class="modal-footer">
{!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
@endforeach

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