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

  		<div><a class="btn btn-success  pull-right " href="{!! URL::to('venta-addcliente') !!}">
  		<i class="fa fa-cubes fa-lg"></i> Agregar Cliente</a></div>
		


		{!! Form::open(array('url' => 'venta-checkout', 'method'=>'POST' )) !!}
		 <!--tipo de pago-->
		<div class="col-md-9">
        <div class="row">
        <div class="form-group">
        <label for="tipo_pago" class="col-sm-6 control-label">Tipo de pago</label>
        <div class="col-sm-8">
        {!! Form::select('tipo_pago', array('Efectivo' => 'Efectivo', 'Cheque' => 'Cheque', 'Targeta de Debito' => 'Targeta de Debito', 'Targeta de Credito' => 'Targeta de Credito' , 'MercadoPago' => 'MercadoPago'), array('class' => 'form-control')) !!}
        </div>
        </div>
        </div>
        </div>
        
        <br><br>

        <!-- ---------------------  cliente   --------------------------- -->
		
		@if(count($cliente))
		@foreach($cliente as $cliente)
		{{ $cliente->clie_nombres }}
		
		@endforeach
		@endif






		<!-- ---------------------  Carrito  --------------------------- -->
		<div class="table-cart">
			@if(count($cart))
			<p>
				<a href="{!! URL::to('venta-trash') !!}" class="btn btn-danger">
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
										data-href="{!! URL::to('venta-update/'.$item->id) !!}"
										data-id = "{{ $item->id }}"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>${{ number_format($item->pro_venta * $item->quantity,2) }}</td>
								<td>
									<a href="{!! URL::to('venta-delete/'.$item->id) !!}" class="btn btn-danger">
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
				

				<a href="{!! URL::to('venta-checkout') !!}" class="btn btn-primary">
				 Confirmar Venta <i class="fa fa-chevron-circle-right"></i>
				</a>
				{!!Form::submit('Confirmar Venta',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
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