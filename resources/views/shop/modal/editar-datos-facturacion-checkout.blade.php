<div class="modal fade" id="userFacturacionEdit" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar Datos de Facturacion</h4>
         </div>

 @if(!empty(DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get()))

{!!Form::model($datosfacturacions,['route'=>['myaccount.EditarFacturacionCheckout',$datosfacturacions->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">      


@include('shop.forms.facturacion')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>

@endif


     </div>
   </div>
 </div>
	