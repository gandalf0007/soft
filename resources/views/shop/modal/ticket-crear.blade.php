<div class="modal fade" id="ticket-crear" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Crear Nuevo Ticket</h4>
         </div>



 {!!Form::open(['url'=>'myaccount-ticket-crear', 'method'=>'POST', 'files'=>True])!!}
<div class="modal-body">  


@include('shop.forms.ticket-crear')


</div>

<div class="modal-footer">
{!!Form::submit('Crear',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
