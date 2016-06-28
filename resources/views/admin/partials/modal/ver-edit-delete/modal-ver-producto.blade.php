@foreach($productos as $producto)
<div class="modal fade" id="ver-{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Ver Producto {{ $producto->pro_descrip }}</h4>
         </div>


{!!Form::model($producto,['route'=>['producto.update',$producto->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">   
<fieldset disabled>
{{ Html::image('storage/' . $producto->path , 'img', array('class' => 'user-image' , 'style'=>'height:100px')) }}

@include('admin.producto.forms.formscreate')
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