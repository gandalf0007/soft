<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Editar User {{ $user->nombre }}</h4>
         </div>



{{ Form::model($user, array('route' => array('myaccount-edit.update', $user->id), 'method' => 'PUT', 'files'=>True)) }}
<div class="modal-body">  

<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Imagen</h3>
 		</div>	
  <div class="panel-body">
<div class="row">    
{{ Html::image('storage/user/' . $user->path , 'img', array('class' => 'center-block user-image' , 'style'=>'height:100px')) }}
</div>
</div>
</div>

@include('shop.forms.user-edit')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
