@foreach($gastos as $gasto)
<div class="modal fade" id="Edit-{{ $gasto->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar gasto {{ $gasto->fecha }}</h4>
         </div>


{!!Form::model($gasto,['route'=>['gasto.update',$gasto->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">      
{{ Html::image('storage/' . $gasto->path , 'img', array('class' => 'user-image' , 'style'=>'height:100px')) }}

@include('admin.gasto.forms.formscreate')
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
