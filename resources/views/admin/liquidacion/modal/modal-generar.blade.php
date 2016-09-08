<div class="modal bs-example-modal-lg fade" id="liquidacion" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Cargar los datos de la Liquidacion</h4>
         </div>


{!! Form::open(array('url'=>'liquidacion-generar', 'method'=>'POST' )) !!}
<div class="modal-body">   



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Datos de Liquidacion MENSUAL</h3>
    </div>  
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-4">
	{!!Form::label('Jornada:')!!}
	{!! Form::select('jornada', config('options.jornada'),'', array('class' => 'form-control')) !!}
</div>


<div class="form-horizontal col-xs-12 col-sm-12 col-md-4">
	{!!Form::label('basico (pesos):')!!}
	{!!Form::text('basico',null,['class'=>'form-control ','placeholder'=>'bascio jornada completa'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-4">
	{!!Form::label('antiguedad (años):')!!}
	{!!Form::text('antiguedadaños',null,['class'=>'form-control ','placeholder'=>'antiguedad'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-4"><br>
	{!!Form::label('Feriados en el mes:')!!}
	{!!Form::text('feriadosmes',null,['class'=>'form-control ','placeholder'=>'firiados en el mes'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-4"><br>
	{!!Form::label('Feriados no trabajados:')!!}
	{!!Form::text('feriadonotrabajado',null,['class'=>'form-control ','placeholder'=>'firiados no trabajados'])!!}
</div>


<div class="form-horizontal col-xs-12 col-sm-12 col-md-4"><br>
	{!!Form::label('Feriados trabajados:')!!}
	{!!Form::text('feriadotrabajado',null,['class'=>'form-control ','placeholder'=>'firiados  trabajados'])!!}
</div>

</div>
</div>
</div>





</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::submit('Confirmar Venta',['class'=>'btn btn-primary pull-right'])!!}
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>