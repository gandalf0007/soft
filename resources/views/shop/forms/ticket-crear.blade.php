<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Crear Nuevo Ticket</h3>
 		</div>	
  <div class="panel-body">
<div class="row">
	
   
  <div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('Titulo:')!!}
	{!!Form::text('subject',null,['class'=>'form-control ','placeholder'=>'ingrese el titulo del mensaje'])!!}<br>
	</div>


<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
  {!!Form::label('Comentario')!!}
  {!!Form::textarea ('comentario',null,['class'=>'col-xs-12 col-sm-12 col-md-12','id'=>'lfm','placeholder'=>'ingrese el comentario'])!!}<br>
</div>


<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
  {!!Form::label('Prioridad')!!}
  {!!Form::select('prioridad',$prioridades,null,['class'=>'form-control'])!!}<br>
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
  {!!Form::label('Categoria')!!}
  {!!Form::select('categoria',$category,null,['class'=>'form-control'])!!}
</div>
</div>
</div>
</div>