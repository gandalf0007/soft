@extends('layouts.admin')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="container-fluid">

 


<table class="table">
  <thead>
    <th>ID</th>
    <th>reporte</th>
    <th>ver</th>
    <th>descargar</th>
  </thead>
  
  <tbody>
  <tr>
    
    <td>1</td>
    <td>Reporte de Usuarios por Pais</td>
    <td><a href="crear_reporte_porpais/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
    <td><a href="crear_reporte_porpais/2" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
  </tr>
 



  </tbody>

  </table>


 
</div>
</div>
@endsection