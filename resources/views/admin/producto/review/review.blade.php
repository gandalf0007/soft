@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Nuevo Producto</h3>
            </div>
			<div class="box-body">
@include('alerts.request')

<table id="example2" class="table table-bordered table-hover">
  <thead>
    <th>Comentario</th>
    <th>Usuario</th>
    <th>Status</th>

    
    <th class="col-md-4">Operaciones</th>
  </thead>
  @foreach($reviews as $review)
  <tbody>
  <!-- -->
  <td>{{ $review -> comment}}</td>
  <td>{{ $review ->user->nombre}}</td>
  <td>
      @if ($review -> approved == 1)
      <span class="label label-success">Aprobado</span>
      @elseif ($review -> approved == 0)
     <span class="label label-danger">Spam</span>
      @endif
  </td>

<td>

<a class="btn btn-success" href="{!! URL::to('producto-review-confirm/'.$review->id) !!}"><i class="fa fa-check">check</i></a>

<a class="btn btn-warning" href="{!! URL::to('producto-review-spam/'.$review->id) !!}"><i class="fa fa-close">span</i></a>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $review->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif

</td>
@endforeach
  </tbody>
  
  </table>
<!--modal de eliminar producto-->
 @include('admin.producto.modal.modal-delete-review')

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


