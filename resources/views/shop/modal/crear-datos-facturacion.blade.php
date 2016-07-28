<div class="modal fade" id="userFacturacion" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Agregar Datos de Facturacion</h4>
         </div>



 {!!Form::open(['route'=>'myaccount.DatosDeFacturacion', 'method'=>'POST', 'files'=>True])!!}
<div class="modal-body">  



@include('shop.forms.facturacion')



</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>



