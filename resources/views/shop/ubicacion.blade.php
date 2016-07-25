@extends('layouts.shop')
@include('alerts.errors')
@section('content')

<div class="breadcrumb pull-left">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Ubicacion</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

		<div class="contact-page">
                <div class="col-md-12 contact-map outer-bottom-vs">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.026790261281!2d-65.2246596855028!3d-26.83910019660109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225c710f21f9e5%3A0xf55ae4fa6dbe92ef!2sMiguel+Lillo+807%2C+4000+San+Miguel+de+Tucum%C3%A1n%2C+Tucum%C3%A1n!5e0!3m2!1ses!2sar!4v1469489932710" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

</div></div>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
