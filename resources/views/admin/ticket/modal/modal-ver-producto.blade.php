@foreach($productos as $producto)
<div class="modal bs-example-modal-lg fade" id="ver-{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Ver Producto {{ $producto->descripcion }}</h4>
         </div>


{!!Form::model($producto,['route'=>['producto.update',$producto->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">   
<fieldset disabled>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Imagen de Portada</h3>
    </div>  
  <div class="panel-body">
<div class="row">
<!--imagen-->

<img src="{{$producto->imagen1}}" class="user-image center-block" alt="" height="100" width="100" >

</div>
</div>
</div>

@include('admin.producto.forms.formsedit')
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