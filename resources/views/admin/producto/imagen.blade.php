@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cargar Imagenes</h3>
            </div>
			<div class="box-body">
@include('alerts.request')


  
  {!!Form::model($producto,['route'=>['ProductoImagen.uploadFiles',$producto->id],'method'=>'POST' , 'files'=>'true' , 'id' => 'my-dropzone' , 'class' => 'dropzone'])!!}
    <div class="dz-message" style="height:200px;">
                        Drop your files here
    </div>
    <div class="dropzone-previews"></div>
    <button type="submit" class="btn btn-success" id="submit">Save</button>
{!! Form::close() !!}
   
 

  <div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Imagen</th>
    <th>Portada</th>
    <th>Eliminar</th>
      </tr>
    </thead>
    @foreach($imagens as $imagen)
    <tbody>
   <td><i class="icon fa fa-fw"><img src="../storage/productos/{{$imagen->nombre}}"  width="100" height="80"></i></td>  

  <td></td>

<td>{!! Form::open(['method' => 'DELETE', 'route' => ['ProductoImagen.destroy',$imagen->id]]) !!}
<button type="submit" class="btn btn-danger">Delete</button>
{!! Form::close() !!}</td> 


  </tbody>
  @endforeach
  </table>
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