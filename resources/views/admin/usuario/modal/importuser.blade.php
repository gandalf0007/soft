<div class="modal fade " id="importuser" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">

   
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Importar Usuarios</h4>
      </div>

{!!Form::open(['url'=>'userImport', 'method'=>'POST' , 'files'=>True ])!!}

<div class="form-horizontal">
	{!!Form::label('file', 'File') !!}
	{!!Form::file('user')!!}
</div>
<br><br>
{!!Form::submit('Importar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

   
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
     </div>
   </div>
 </div>
