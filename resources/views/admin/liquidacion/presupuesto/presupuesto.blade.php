@extends('layouts.app')

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa  fa-bank"></i>Seccion Presupuestos</h3>
            </div>
			<div class="box-body">

     		
			 <!-- ---------------------  cliente   --------------------------- -->
     		<div class="box-header with-border ">
              <h3 class="box-title">Datos del Cliente</h3>

              <a class="btn btn-success  pull-right " href="{!! URL::to('presupuesto-addcliente') !!}"><i class="fa  fa-users fa-lg"></i> Agregar Cliente</a>
              
            </div>
			@if(count($cliente))
            <div class="box-body">
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" class="form-control" placeholder="direccion" value="{{ $cliente->clie_direccion}}" disabled>
             </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-gavel"></i></span>
                 <input type="text" class="form-control" placeholder="Cuit" value="{{ $cliente->clie_cuit}}" disabled>
              </div>
              
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                 <input type="text" class="form-control" placeholder="telefono" value="{{ $cliente->clie_telefono}}" disabled>
              </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="cliente" value="{{ $cliente->clie_nombres}}" disabled>
              </div>
              </div>
              @endif
<br><br><br>
		
			

<!-- ---------------------  Carrito  --------------------------- -->
			<div class="box-header with-border ">
              <h3 class="box-title">Datos de los Productos</h3>
             <a class="btn btn-success  pull-right " href="{!! URL::to('presupuesto-addproducto') !!}">
  				<i class="fa fa-cubes fa-lg"></i> Agregar Producto</a>
            </div>
        <br><br>
		
		<div class="table-cart">
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
										data-href="{!! URL::to('presupuesto-update/'.$item->id) !!}"
										data-id = "{{ $item->id }}"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>${{ number_format($item->pro_venta * $item->quantity,2) }}</td>
								<td>
									<a href="{!! URL::to('presupuesto-delete/'.$item->id) !!}" class="btn btn-danger">
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
				

				
				
		{!! Form::open(array('url' => 'presupuesto-checkout', 'method'=>'POST' )) !!}
		 <!--tipo de pago-->
		<div class="box-header with-border ">
            <h3 class="box-title">Datos Adicionales</h3>
         </div><br>

        <div class="form-group">
        <label for="tipo_pago" class="control-label">Tipo de pago</label>
        {!! Form::select('tipo_pago', config('options.tipopago'),'', array('class' => 'form-control')) !!}
        </div><br>
			
		<a href="{!! URL::to('presupuesto-trash') !!}" class="btn btn-danger">Vaciar Venta <i class="fa fa-trash"></i></a>
				
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