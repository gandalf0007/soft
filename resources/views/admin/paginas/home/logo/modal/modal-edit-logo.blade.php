@foreach($logos as $logo)
<div class="modal fade bs-example-modal-lg" id="Edit-{{ $logo->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar carrucel </h4>
         </div>


{!!Form::model($logo,['route'=>['logo.update',$logo->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">      


@include('admin.paginas.home.logo.forms.formscreate')
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