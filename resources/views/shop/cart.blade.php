@extends('layouts.shop')
@include('alerts.success')
@section('content')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

		
 <h1>Responsive Checkout Progress Bar</h1>
  <! -- To test add 'active' class and 'visited' class to different li elements -->
  
<div class="checkout-wrap center-block">
  <ul class="checkout-bar">

    <li class="active">Resumen</li>
    
    <li class="">Iniciar Sesion</li>
    
    <li class="">Direccion</li>
    
    <li class="">Transporte</li>
    
    <li class="">Pago</li>
       
  </ul>
</div>
    
<br><br><br><br><br>





<div class="table-cart container">
			@if(count($cart))
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $item)
							<tr> 
								<td><img src="storage/productos/{{$item->imagen1}}" alt="" style="height:50px"></td>
								<td>{{ $item->descripcion }}</td>
								<td>${{ number_format($item->precioventa,2) }}</td>
								<td>
									<input 
										type="number"
										min="1"
										max="100"
										value="{{ $item->quantity }}"
										id="product_{{ $item->id }}"
									>
									<a 
										href="#" 
										class="btn btn-warning btn-update-item"
										data-href="{!! URL::to('web-update/'.$item->id) !!}"
										data-id = "{{ $item->id }}"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>${{ number_format($item->precioventa * $item->quantity,2) }}</td>
								<td>
									<a href="{!! URL::to('web-delete/'.$item->id) !!}" class="btn btn-danger">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
				<h3>
					<span class="label label-success pull-right">
						Total: ${{ number_format($total,2) }}
					</span>
				</h3>

			</div>
			@else
				<h3><span class="label label-warning">No hay productos Seleccionados :</span></h3>
			@endif
			<hr>
			<p>
				
	
		

		<br>

		<a href="{!! URL::to('web-trash') !!}" class="btn btn-danger">Vaciar Carrito <i class="fa fa-trash"></i></a>

		<a href="{!! URL::to('checkout') !!}" class="btn btn-azul">Confirmar Compra<i class=""></i></a>
				
		

			</p>
		</div>



		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
