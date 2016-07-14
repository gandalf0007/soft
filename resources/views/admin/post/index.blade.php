@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->
<section class="content">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Seccion de Post</h3>
    </div>  
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12">
              <div class="box-header"> 

              @include('alerts.request')

            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('post/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Post</a>
            </div>

            </div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Id</th>
    <th>titulo</th>
    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($posts as $post)
    <tbody>
  <td>{{ $post -> id}}</td>
  <td>{{ $post -> titulo}}</td>
  
  
<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $post->id }}"><i class="fa fa-expand"> Ver</i></button>


{!! link_to_route('post.edit', $title = 'Editar', $parameters = $post->id  , $attributes = ['class'=>'btn btn-primary']); !!}
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $post->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  </table>

<!--modal ver post-->
 @include('admin.post.modal.show')
<!--modal eliminar post-->
 @include('admin.post.modal.delete')


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