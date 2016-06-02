@foreach($provedores as $provedore)
<div class="modal fade" id="Edit-{{ $provedore->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar Provedor {{ $provedore->prov_razsoc }}</h4>
         </div>


{!!Form::model($provedore,['route'=>['provedor.update',$provedore->id],'method'=>'PUT'])!!}

<div class="modal-body">      
@include('admin.provedor.forms.formscreate')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach