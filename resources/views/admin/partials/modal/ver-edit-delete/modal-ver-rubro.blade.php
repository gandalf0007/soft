@foreach($rubros as $rubro)
<div class="modal fade" id="ver-{{ $rubro->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar Rubro {{ $rubro->descripcion }}</h4>
         </div>


{!!Form::model($rubro,['route'=>['rubro.update',$rubro->id],'method'=>'PUT'])!!}

<div class="modal-body">  

<fieldset disabled> 
<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>
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