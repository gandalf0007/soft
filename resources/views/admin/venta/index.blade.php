@extends('layouts.app')

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa  fa-bank"></i>Seccion Ventas</h3>
            </div>
			<div class="box-body">


		<div><a class="btn btn-success  pull-right " href="{!! URL::to('venta-addproducto') !!}">
  		<i class="fa fa-cubes fa-lg"></i> Agregar Producto</a></div>


		<div class="table-cart">
			@if(count($cart))
			<p>
				<a href="{!! URL::to('cart-trash') !!}" class="btn btn-danger">
					Vaciar Venta <i class="fa fa-trash"></i>
				</a>
			</p>


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
								<td><img src="{{ $item->path }}"></td>
								<td>{{ $item->pro_descrip }}</td>
								<td>${{ number_format($item->pro_venta,2) }}</td>
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
										data-href="{!! URL::to('cart-update/'.$item->id) !!}"
										data-id = "{{ $item->id }}"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>${{ number_format($item->pro_venta * $item->quantity,2) }}</td>
								<td>
									<a href="{!! URL::to('cart-delete/'.$item->id) !!}" class="btn btn-danger">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table><hr>
				
				<h3>
					<span class="label label-success">
						Total: ${{ number_format($total,2) }}
					</span>
				</h3>

			</div>
			@else
				<h3><span class="label label-warning">No hay productos Seleccionados :</span></h3>
			@endif
			<hr>
			<p>
				

				<a href="{!! URL::to('cart-checkout') !!}" class="btn btn-primary">
				 Confirmar Venta <i class="fa fa-chevron-circle-right"></i>
				</a>
			</p>
		</div>


			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@stop