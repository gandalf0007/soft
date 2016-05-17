@extends('layouts.app')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reportes</h3>
            </div>
      <div class="box-body">
 

<table id="example2" class="table table-bordered table-hover">
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection