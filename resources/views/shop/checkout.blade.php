@extends('layouts.shop')
@include('alerts.errors')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

	   
    <h1>Responsive Checkout Progress Bar</h1>
  <! -- To test add 'active' class and 'visited' class to different li elements -->
  
<div class="checkout-wrap">
  <ul class="checkout-bar">

    <li class="visited first">
      <a href="#">Login</a>
    </li>
    
    <li class="previous visited">Shipping & Billing</li>
    
    <li class="active">Shipping Options</li>
    
    <li class="next">Review & Payment</li>
    
    <li class="">Complete</li>
       
  </ul>
</div>
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
