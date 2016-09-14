@extends('layouts.shop')
@include('alerts.errors')
@section('content')


<?php
require_once "../lib/mercadopago.php";

$mp = new MP("5038272799674049", "vDjzWpNZ0nrx3j9o7hSIcYw3QB4m9Igj");

        //calculamos el total para mandar al carrito
        $cart = \Session::get('cartweb');
       
     
       //agregamos el porcentaje
        $porcentaje = DB::table('web_mercadopagos')->first();
       
$preference_data = array(
    "items" => array(
        array(
            "id" => "code",
            "title" => "SharkInformatica",
            "currency_id" => "AR",
            "picture_url" =>"https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
            "description" => "Productos",
            "category_id" => "Category",
            "quantity" => 1,
            "unit_price" => ((($totalaux * $porcentaje->porcentaje)/100) + $totalaux)
        )
    ),
    

    "notification_url" => "https://www.your-site.com/ipn",
    "external_reference" => "Reference_1234",
    "expires" => false,
    "expiration_date_from" => null,
    "expiration_date_to" => null
);

$preference = $mp->create_preference($preference_data);
?>


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

	   
    <h1>Responsive Checkout Progress Bar</h1>
  <! -- To test add 'active' class and 'visited' class to different li elements -->
  
<div class="checkout-wrap center-block">
  <ul class="checkout-bar">

    <li class="active">Iniciar Sesion</li>
    
    <li class="active">Direccion</li>
    
    <li class="active">Transporte</li>
    
    <li class="active">Confirmar</li>
    
    <li class="active">Pagar</li>
       
  </ul>
</div>
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>
   <div class="col-xs-12 col-sm-2 no-padding">
        
    </div>
<div class="col-xs-12 col-sm-10 no-padding">

<iframe src="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" width="800" height="800" frameborder="0"></iframe>


        <script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
</div>
        <br><br><br><br><br><br>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
