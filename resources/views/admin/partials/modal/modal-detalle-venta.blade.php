@foreach($ventas as $venta)
<div class="modal fade" id="datalle-{{ $venta->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Confirm Product Deletion</h4>
         </div>
        
  <table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <td>Mostrar</td>
    <th>Vendedor</th>
    <th>Cliente</th>
    <th>Pago</th>
    <th>Comentario</th>
    <th>Total</th>
    <th>Estatus</th>
    <th>Fecha</th>
      </tr>
    </thead>
    <tbody>


  </tbody>
  </table>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
         </div>
     </div>
   </div>
 </div>

@endforeach
