@extends('layouts.shopmenu')
@section('content')


<div class="breadcrumb pull-left">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Aviso Legal</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->


	<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row outer-bottom-vs">
			<div class="blog-page">
<!-- ==================BlOG===================================== -->	
<div class="col-md-9">
<div class="blog-post wow fadeInUp">
@foreach($informacions as $informacion)	

	{!! $informacion->avisolegal !!}

@endforeach
</div>
<br><br>



<!-- ==================BlOG===================================== -->
				
			</div>
		</div>
	</div>
</div>
</div>

		


@endsection