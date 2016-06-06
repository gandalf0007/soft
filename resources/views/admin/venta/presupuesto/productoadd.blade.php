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
    <td>{{ $producto -> pro_codigo}}</td>
    <td><img src="storage/{{$producto->path}}" alt="" style="height:100px"></td>
    <td>{{ $producto -> pro_descrip}}</td>
    <td>{{ $producto -> iva_id}}</td>
    <td>{{ $producto -> pro_preciocosto}}</td>
    <td>{{ $producto -> pro_venta}}</td>
    <td>{{ $producto -> pro_precio2}}</td>
    <td>{{ $producto -> pro_stock_act}}</td>

 
<td>
<a href="{{ URL::to('presupuesto-addtocart/'.$producto->id) }}">{{ Form::submit('Add To Cart',array('class'=>'btn btn-success')) }}</a>
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