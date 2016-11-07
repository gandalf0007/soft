@if(count($user))
<div class="modal fade bs-example-modal-lg" id="Agregar-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Agregar Puntos  </h4>
         </div>


{!!Form::model($user,['url'=>['puntos-agregar-puntos',$user->id],'method'=>'GET' , 'files'=>True])!!}

<div class="modal-body">      


@include('admin.puntos.forms.formsagregar')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
@endif