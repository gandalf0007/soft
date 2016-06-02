@foreach($ventas as $venta)
<div class="modal fade " id="datalle-{{ $venta->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">

          <!----------------------------   tabla del vendedor   -------------------->
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Detalle del Vendedor</h4>
      </div>
 <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Nombre</th>
    <th>Apellido</td>
    <th>Email</th>
    <th>Perfil</th>
    <th>Cuit</th>
      </tr>
    </thead>
    <tbody>
   <td>{{ $venta->user->usu_nombre }}</td>
   <td>{{ $venta->user->usu_apellido }}</td>
   <td>{{ $venta->user->usu_email }}</td>
   <td>{{ $venta->user->perfil->descripcion }}</td>
  </tbody>
  </table>

      <!----------------------------  tabla del Cliente   -------------------->
     <div class="modal-header">
      <h4 class="modal-title">Detalle del Cliente</h4>
     </div>
 <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Nombre</th>
    <th>Direccion</td>
    <th>Telefono</th>
    <th>Email</th>
    <th>Cuit</th>
      </tr>
    </thead>
    <tbody>
   <td>{{ $venta->cliente->clie_nombres }}</td>
   <td>{{ $venta->cliente->clie_direccion }}</td>
   <td>{{ $venta->cliente->clie_Telefono }}</td>
   <td>{{ $venta->cliente->clie_mail }}</td>
   <td>{{ $venta->cliente->clie_cuit }}</td>
  </tbody>
  </table>

      <!----------------------------   tabla del Producto   -------------------->
    <div class="modal-header">
        <h4 class="modal-title">Detalle de los Productos</h4>
    </div>
    <div class="table-responsive">
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <th>Imagen</th>
    <th>Codigo</td>
    <th>Descripcion</th>
    <th>Cantidad</th>
    <th>Precio Venta</th>
    <th>Marca</th>
    <th>Total</th>
      </tr>
    </thead>
    <!--solo muestro las transacciones con el id de sa venta-->
    @foreach($transactions as $transaction)
    @if ($venta->id == $transaction->venta_id )
    <tbody>
   <td>{{ $transaction->producto->path }}</td>
   <td>{{ $transaction->producto->pro_codigo }}</td>
   <td>{{ $transaction->producto->pro_descrip }}</td>
   <td>{{ $transaction->cantidad }}</td>
   <td>{{ $transaction->producto->pro_venta }}</td>
   <td>{{ $transaction->producto->marca->descripcion }}</td>
   <td>{{ $transaction->total_price }}</td>
  </tbody>
  @endif
  @endforeach
  </table>
        <h3>
          <span class="label label-success pull-right">
            Total: ${{ $venta -> total}}
          </span>
        </h3>
</div>
<br>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
     </div>
   </div>
 </div>
@endforeach
