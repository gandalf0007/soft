<html>
<head>
<title>Factura Shark Informatica</title>


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

 
    @if($id == $ventas->id)

    <table width="100%">
      <tbody>
        <tr>
          <td width="30%">
           <img height="150" width="250" class="img-responsive" src="storage/paginas/home/logo/{{ $logo->logo }}" alt=""> <!-- your logo here -->
          </td>
          <td width="70%">
            <h2>Shark Informatica</h2><br>
            <strong>Date:</strong> <?php echo date('d/M/Y');?><br>
            <strong>Fecha de Facturacion : {{ $ventas->created_at }}</strong> <br>
            <strong>Número de factura :</strong> {{ $ventas->id }}<br>
            <strong>Fecha de vencimiento:</strong> 10/01/2013<br>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
       
      </tbody>
    </table>
    <p>&nbsp;</p>

<table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right center">
          <td width="45%"><strong>Detalles de Facturacion</strong></td>
          <td width="25%"><strong>Detalles de Envio: </strong></td>
          <td width="30%"><strong>Detalle de pago</strong></td>
        </tr>

        <tr class="border-right">

        <td >
            <div >
        @if(!empty(DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get()))
        <h4><strong>Razon Social :</strong>
        {{ $datosfacturacions->razonsocial }}</h4>
         <strong>Cuit:</strong> {{ $datosfacturacions->cuit }} <br>
        @else
        <strong>Nombre :</strong>{{ $user->nombre }} {{$user->apellido }}
        @endif <br>
                    <strong>Direccion: </strong> {{ $user->direccion }} <br>
                    <strong>CP: </strong> {{ $user->cp }} <br>
                    <strong>Provincia: </strong> {{ $user->provincia }} <br>
                    <strong>Ciudad: </strong> {{ $user->ciudad }} <br>
                    <strong>Telefono :</strong> {{ $user->telefono }} <br>
                    <strong>Email:</strong>{{ $user->email }}
            </div>
          </td>

          <td >
            <div >
                    <strong>Envio :</strong> {{ $ventas->transporte }} <br>
                    
            </div>
          </td>


          <td >
            <div >
              <strong>Numero de Factura:</strong>#{{ $ventas->id }} <br>
              <strong>Tipo de Pago:</strong> {{ $ventas->pago_tipo }}<br>
              @if($ventas->pago_tipo == "Desposito bancario")
                    <strong>N De Cuenta Corriente : </strong>472 USD<br>
                    <strong>Titular : </strong>Completed<br>
                    <strong>Cuit : </strong>Completed<br>
                    <strong>CBU : </strong>Completed<br>
              @endif
            </div>
          </td>

          

        </tr>
      </tbody>
    </table>

<br><br>

    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td colspan="10"><strong>Productos</strong></td>
        </tr>
        <tr class="border-bottom border-right ">
            <td>Codigo</td>
            <td>Descripcion</td>
            <td>Cantidad</td>
            <td>Precio Venta</td>
            <td>Marca</td>
            <td>Sub Total</td>
        </tr>
        @foreach($transactions as $transaction)
         @if ($ventas->id == $transaction->web_venta_id )
        <tr class="border-right">
  
          <td>{{ $transaction->producto->codigo }}</td>
          <td>{{ $transaction->producto->descripcion }}</td>
          <td>{{ $transaction->cantidad }}</td>
          <td>{{ $transaction->producto->precioventa }}</td>
          <td>{{ $transaction->producto->marca->descripcion }}</td>
          <td>{{ $transaction->total_price }}</td>
        </tr>
        
      </tbody>
       @endif
  @endforeach
    </table>
    <p>&nbsp;</p>



    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td colspan="3"><strong>Summary</strong></td>
        </tr>
        <tr class="border-bottom border-right center">
          <td width="45%"><strong>Activity</strong></td>
          <td width="25%"><strong>Tax</strong></td>
          <td width="30%"><strong>Amount (INR)</strong></td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">Summary Line item 1</td>
          <td class="center">Tax percent (12.36%)</td>
          <td class="right-center">Rs. 11,236</td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">&nbsp;</td>
          <td class="right border-top">Subtotal</td>
          <td class="right border-top">Rs. 10,000</td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">&nbsp;</td>
          <td class="right border-top">Tax</td>
          <td class="right border-top">Rs. 1236</td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">&nbsp;</td>
          <td class="right border-top">Total</td>
          <td class="right border-top">${{$ventas->total}}</td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>

    
    
    <p>&nbsp;</p>
     <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <strong>INSTRUCCIONES IMPORTANTES: </strong>
                <h5># Este es un recibo electrónico por lo que no requiere ninguna firma.</h5>
                <h5># Todos los particulares se enumeran con el 21 % de impuestos , así que si tiene cualquier problema, por favor póngase en contacto con nosotros inmediatamente.</h5>
                <h5># Se puede ponerse en contacto con nosotros entre las 8:00-12:00 am a 16:00-20:00 pm todos los días laborables .</h5>
                </div>
            </div>
     @endif
       
  </div>

</body>
</html>