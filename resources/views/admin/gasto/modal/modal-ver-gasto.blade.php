@foreach($gastos as $gasto)
<div class="modal fade" id="ver-{{ $gasto->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Ver Gasto </h4>
         </div>


{!!Form::model($gasto,['route'=>['gasto.update',$gasto->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">
<fieldset disabled>      
{{ Html::image('storage/' . $gasto->file , 'img', array('class' => 'user-image' , 'style'=>'height:100px')) }}
@include('admin.gasto.forms.formscreate')
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