@extends('layouts.shop')
@include('alerts.errors')
@section('content')

<?php
require_once "../lib/mercadopago.php";

$mp = new MP("5038272799674049", "vDjzWpNZ0nrx3j9o7hSIcYw3QB4m9Igj");

$preference_data = array(
    "items" => array(
        array(
            "id" => "Code",
            "title" => "hola soy goku",
            "currency_id" => "AR",
            "picture_url" =>"https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
            "description" => "asdasdasdsadsadasdasdasdasds",
            "category_id" => "Category",
            "quantity" => 1,
            "unit_price" => 10
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

    <li class="active">Resumen</li>
    
    <li class="active">Iniciar Sesion</li>
    
    <li class="active">Direccion</li>
    
    <li class="active">Transporte</li>
    
    <li class="">Confirmar Y Pagar</li>
       
  </ul>
</div>
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>



 <a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pay</a>
        <script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
