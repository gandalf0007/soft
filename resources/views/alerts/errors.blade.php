<!-- muestra mensaje cuando se loguea el usuario-->
@if(Session::has('message-error'))
<div class="alert alert-danger" role="alert">
  <a href="#" class="alert-link"></a>
  {{Session::get('message-error')}}
</div>
@endif