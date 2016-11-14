<html>
<head>
<title>Servicio Shark Informatica</title>


<style type="text/css">
  #page-wrap {
    width: 700px;
    margin: 0 auto;
  }
  .center-justified {
    text-align: justify;
    margin: 0 auto;
    width: 30em;
  }
  table.outline-table {
    border: 1px solid;
    border-spacing: 0;
  }
  tr.border-bottom td, td.border-bottom {
    border-bottom: 1px solid;
  }
  tr.border-top td, td.border-top {
    border-top: 1px solid;
  }
  tr.border-right td, td.border-right {
    border-right: 1px solid;
  }
  tr.border-right td:last-child {
    border-right: 0px;
  }
  tr.center td, td.center {
    text-align: center;
    vertical-align: text-top;
  }
  td.pad-left {
    padding-left: 5px;
  }
  tr.right-center td, td.right-center {
    text-align: right;
    padding-right: 50px;
  }
  tr.right td, td.right {
    text-align: right;
  }
  .grey {
    background:grey;
  }
</style>
</head>
<body>
  <div id="page-wrap">


    <table width="100%">
      <tbody>
        <tr>
          <td width="30%">
        <img height="150" width="250" class="img-responsive" src="storage/paginas/home/logo/{{ $logo->logo }}" alt="">
        <!-- your logo here -->
          </td>
          <td width="70%">
            <h2>Reparaciones Shark Informatica</h2><br>
            <strong>Fecha :</strong> <?php echo date('d/M/Y');?><br>
            <strong>Direccion :</strong> {{$informacion->direccion1}}<br>
            <strong>Telefonos :</strong> {{$informacion->telefono1}} ---{{$informacion->telefono2}}<br>
            <strong>Web :</strong> http://sharkinformatica.com/ <br>
            <strong>Correo :</strong>{{$informacion->correo1  }} <br><br>
            <strong>Recibido por :</strong>{{$vendedor->apellido  }} {{$vendedor->nombre  }} <br>
          </td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>




    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td colspan="10"><strong></strong></td>
        </tr>

        <tr>
    <td> Apellido Y Nombre : {{$Reparacione->user->apellido}} {{$Reparacione->user->nombre}}</td>
    <td>N° Cliente: {{$Reparacione->user_id}}</td>
        </tr>

        <tr >
          <td>Equipo : {{$Reparacione->equipo}}</td>
          <td>N° Serie : {{$Reparacione->serie}}</td>
        </tr>
        
      </tbody>


      
    </table>
    <p>&nbsp;</p>



    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td ><strong>DETALLE DE LA FALLA DESCRIPTA POR EL CLIENTE (a verificar en el servicio tecnico)</strong></td>
        </tr>
        <tr class="border-bottom border-right ">
          <td><strong>{!!$Reparacione->falla!!}</strong></td>
        </tr>
       
      </tbody>
    </table>
    <p>&nbsp;</p>

    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td><strong>ACCESORIOS</strong></td>
        </tr>
        <tr class="border-bottom border-right ">
          <td><strong>{!!$Reparacione->accesorio!!}</strong></td>
        </tr>
       
      </tbody>
    </table>

    <p>&nbsp;</p>

    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td ><strong>OBSERVACIONES</strong></td>
        </tr>
        <tr class="border-bottom border-right ">
          <td><strong>{!!$Reparacione->observaciones!!}</strong></td>
        </tr>
       
      </tbody>
    </table>



    <p>&nbsp;</p>
    <table>
      <tbody>
        <tr>
          <td>
           <strong>IMPORTANTE : </strong> La empresa no se Hará responsable ante daño o perdida de información, total o parcial que puedan ser causadas por razones involuntarias  o  por motivos ajenos a nuestra empresa. El cliente es el responsable de la totalidad de los datos y programas instalados en su equipo. Si el equipo no fuese retirado dentro de los (90) días después de ser ingresado, se lo considerara abandonado. En este supuesto SHARK INFORMATICA adquirirá su dominio, quedando facultada para disponer del equipo, perdiendo el CLIENTE todo derecho a reclamo o indemnización alguna (Art. 2525 y 2526 del código civil).  
          </td>
        </tr>

        <tr>
        Firma de la empresa : 
        ...............................<br><br><br>
        </tr>
      </tbody>
    </table>
  
  </div>
</body>
</html>