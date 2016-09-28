@foreach($tickets as $ticket)
<div class="modal fade " id="status-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Cambiar Status del Ticket</h4>
      </div>



<div class="container">
  {!!Form::open(['url'=>['tickets-cambiar-status',$ticket->id], 'method'=>'POST' ])!!}

<div class="form-horizontal">
	<span class="label label-success">{!!Form::label('Solucionado', 'Solucionado') !!}</span>
	<input name="pago" 	type="radio" value="1" checked="checked" >
</div>
<div class="form-horizontal">
	<span class="label label-warning">{!!Form::label('Pendiente', 'Pendiente') !!}</span>
	<input name="pago" type="radio" value="2" >
</div>

<br><br>
{!!Form::submit('Cambiar Estado',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
</div>

	
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
     </div>
   </div>
 </div>
@endforeach
