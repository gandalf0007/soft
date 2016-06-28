@foreach($productos as $producto)
<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Seleccione El Producto</h4>
         </div>


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

 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

 <!--<td>{!! link_to_route('producto.edit', $title = 'editar', $parameters = $producto->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>-->


<td>
<a href="{{ URL::to('venta-addtocart/'.$producto->id) }}">{{ Form::submit('Agregar',array('class'=>'btn btn-success')) }}</a>
</td>


	</tbody>
	@endforeach
	</table>



     </div>
   </div>
 </div>
	@endforeach