@foreach($transportes as $transporte)
<div class="modal fade" id="ver-{{ $transporte->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Ver transporte {{ $transporte->transp_descrip }}</h4>
         </div>


{!!Form::model($transporte,['route'=>['transporte.update',$transporte->id],'method'=>'PUT'])!!}

<div class="modal-body">
<fieldset disabled>
@include('admin.configuracion.transporte.forms.formscreate')
</fieldset>  
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach