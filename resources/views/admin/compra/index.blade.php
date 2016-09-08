@extends('layouts.app')

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa  fa-bank"></i>Seccion Compras</h3>
            </div>
			<div class="box-body">

     		
			 <!-- ---------------------  cliente   --------------------------- -->
     		<div class="box-header with-border ">
              <h3 class="box-title">Datos del Provedor</h3>

              <a class="btn btn-success  pull-right " href="{!! URL::to('compra-addprovedor') !!}"><i class="fa  fa-users fa-lg"></i> Agregar Provedor</a>
              
            </div>
			@if(count($provedor))
            <div class="box-body">
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" class="form-control" placeholder="direccion" value="{{ $provedor->email}}" disabled>
             </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-gavel"></i></span>
                 <input type="text" class="form-control" placeholder="Cuit" value="{{ $provedor->cuit}}" disabled>
              </div>
              
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                 <input type="text" class="form-control" placeholder="telefono" value="{{ $provedor->telefono}}" disabled>
              </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="provedor" value="{{ $provedor->razonsocial}}" disabled>
              </div>
              </div>
              @endif
<br><br><br>
		
			

<!-- ---------------------  Carrito  --------------------------- -->
			<div class="box-header with-border ">
              <h3 class="box-title">Datos de los Productos</h3>
             
			<a class="btn btn-success  pull-right " data-toggle="modal" data-target="#productos"><i class="fa  fa-cubes fa-lg"></i> Agregar Producto</a>

            </div>
        <br><br>
		
		<div class="table-cart">
			@if(count($compracart))
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
						@foreach($compracart as $item)
							<tr> 
								<td><img src="storage/productos/{{$item->imagen1}}" alt="" style="height:100px"></td>
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
										data-href="{!! URL::to('compra-update/'.$item->id) !!}"
										data-id = "{{ $item->id }}"
									>
										<i class="fa fa-refresh"></i>
									</a>
								</td>
								<td>${{ number_format($item->precioventa * $item->quantity,2) }}</td>
								<td>
									<a href="{!! URL::to('compra-delete/'.$item->id) !!}" class="btn btn-danger">
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
				

				
				
		{!! Form::open(array('url' => 'compra-checkout', 'method'=>'POST' )) !!}
		 <!--tipo de pago-->
		<div class="box-header with-border ">
            <h3 class="box-title">Datos Adicionales</h3>
         </div><br>

        <div class="form-group">
        <label for="tipo_pago" class="control-label">Tipo de pago</label>
        {!! Form::select('tipo_pago', config('options.tipopago'),'', array('class' => 'form-control')) !!}
        </div><br>
			
		<a href="{!! URL::to('compra-trash') !!}" class="btn btn-danger">Vaciar Venta <i class="fa fa-trash"></i></a>
				
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

@include('admin.compra.modal.modal-compra-agregarproducto')
@stop