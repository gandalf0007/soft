<!-- si mi errores son mayores a cero , entocens -->
@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
  <!--creamos una lista y recorremos los errores para imprimir cada error-->
  @foreach($errors->all() as $error)
  <li>{!! $error !!}</li>
  @endforeach
</div>
@endif