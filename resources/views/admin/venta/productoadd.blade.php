@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Usuarios</h3>
            </div>
			<div class="box-body">
 




<table id="example2" class="table table-bordered table-hover">
    <thead>
        <th>Codigo</th>
        <th>Imagen</th>
        <th>Descripcion</th>
        <th>Iva</th>
        <th>Costo</th>
        <th>venta</th>
        <th>venta 2</th>
        <th>Stock</th>
        <th>Agregar</th>

    </thead>
    @foreach($productos as $producto)
    <tbody>
    <!-- -->
    <td>{{ $producto -> codigo}}</td>
    <td><img src="storage/{{$producto->path}}" alt="" style="height:100px"></td>
    <td>{{ $producto -> descripcion}}</td>
    <td>{{ $producto -> iva_id}}</td>
    <td>{{ $producto -> preciocosto}}</td>
    <td>{{ $producto -> precioventa}}</td>
    <td>{{ $producto -> precio2}}</td>
    <td>{{ $producto -> stockactual}}</td>

 
<td>
<a href="{{ URL::to('venta-addtocart/'.$producto->id) }}">{{ Form::submit('Add To Cart',array('class'=>'btn btn-success')) }}</a>
</td>


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