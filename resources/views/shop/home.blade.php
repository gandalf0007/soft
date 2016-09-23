@extends('layouts.shopmenu')
@include('alerts.errors')
@section('content')




		

<!-- ========================== CARRUCEL ================================== -->
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">			
<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		
		@foreach($carrucels as $carrucel)
		<div class="item" style="background-image: url(storage/paginas/home/carrucel/{{ $carrucel->imagen }});">
			<div class="container-fluid">
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->
		@endforeach

		</div><!-- /.owl-carousel -->
	</div>
</div>	
<!-- ========================== CARRUCEL ================================== -->




<!-- ========================== NEW PRODUCT ================================== -->
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder ">
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">Nuevos Productos</h3>
	</div>


	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
	
	@foreach($nuevos as $nuevo)			    	
<div class="item item-carousel">
	<div class="product">

		<div class="product-image">
			<div class="image">
			@if($nuevo->imagen1 == "sin-foto.jpg")

				<a href="item-detalle-{{ $nuevo->slug }}">
				<img src="storage/productos/{{$nuevo->imagen1}}" data-echo="storage/productos/{{$nuevo->imagen1}}" class="" alt="" height="150" width="200" >
				</a>
			@elseif($nuevo->imagen1 != "sin-foto.jpg")
				<a href="item-detalle-{{ $nuevo->slug }}">
				<img src="{{$nuevo->imagen1}}" data-echo="{{$nuevo->imagen1}}" class="" alt="" height="150" width="200" >
				</a>
			@endif
			</div><!-- /.image -->			
			<div class="tag new"><span>New</span></div>		   
		</div><!-- /.product-image -->
			

		<div class="product-info text-left col-md-12">
	<h3 class="name"><a href="item-detalle{{ $nuevo->id }}">{{$nuevo->descripcion}}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>
			<div class="product-price">	
				<span class="price">${!! $nuevo->precioventa !!}</span>
				<span class="price-before-discount">${!! $nuevo->precio2 !!}</span>				
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->


			<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">

			@if($nuevo->stockactual > 0)
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="{{ route('web.AddToCart',['id'=>$nuevo->id]) }}"	class="btn btn-primary" type="button">Agregar</a>
			</li>  
			@else
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="#"	class="btn btn-danger" type="button">Agotado</a>
			</li>  
			@endif

	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-retweet"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->

	</div><!-- /.product -->
</div><!-- /.item -->

@endforeach
						</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->       
		</div><!-- /.tab-content -->

</div><!-- /.scroll-tabs -->
</div><!-- /.col-xs-12 col-sm-1 -->	
<!-- ========================== NEW PRODUCT ================================== -->







<!-- ========================== SALE PRODUCT ================================== -->
<div class=" col-xs-12 col-sm-12 col-md-3"></div>
<div class=" col-xs-12 col-sm-12 col-md-9">
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">Productos Mas Vendidos</h3>
	</div>


	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
	
	@foreach($sales as $sale)			    	
<div class="item item-carousel">
	<div class="product">

		<div class="product-image">
			<div class="image">
			@if($sale->imagen1 == "sin-foto.jpg")
				<a href="item-detalle-{{ $sale->slug }}">
				<img src="storage/productos/{{$sale->imagen1}}" data-echo="storage/productos/{{$sale->imagen1}}" class="" alt="" height="150" width="200" >
				</a>
			@elseif($sale->imagen1 != "sin-foto.jpg")
				<a href="item-detalle-{{ $sale->slug }}">
				<img src="{{$sale->imagen1}}" data-echo="{{$sale->imagen1}}" class="" alt="" height="150" width="200" >
				</a>
			@endif
			</div><!-- /.image -->			
			<div class="tag sale"><span>Sale</span></div>		   
		</div><!-- /.product-image -->
			

		<div class="product-info text-left">
	<h3 class="name"><a href="item-detalle{{ $sale->id }}">{{$sale->descripcion}}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>
			<div class="product-price">	
				<span class="price">${!! $sale->precioventa !!}</span>
				<span class="price-before-discount">${!! $sale->precio2 !!}</span>				
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->


			<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">

			@if($sale->stockactual > 0)
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="{{ route('web.AddToCart',['id'=>$sale->id]) }}"	class="btn btn-primary" type="button">Agregar</a>
			</li>  
			@else
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="#"	class="btn btn-danger" type="button">Agotado</a>
			</li>  
			@endif    
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-retweet"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->

	</div><!-- /.product -->
</div><!-- /.item -->

@endforeach
						</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->       
		</div><!-- /.tab-content -->

</div><!-- /.scroll-tabs -->
</div><!-- /.col-xs-12 col-sm-1 -->	
<!-- ========================== SALE PRODUCT ================================== -->



<!-- ========================== PC ARMADAS ================================== -->
<div class=" col-xs-12 col-sm-12 col-md-3 "></div>
<div class="col-xs-12 col-sm-12 col-md-9 hidden-xs hidden-sm homebanner-holder">
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
<div class="more-info-tab clearfix">
	  <h3 class="new-product-title pull-left">Pc Armadas</h3> 
	</div>

<div class="accordian">
	<ul>
		<li>
			<div class="image_title">
				<a href="#">T-OFFICE</a>
			</div>
			<a href="{{ url('/subcategoria-59') }}">
				<img src="storage/slider/1.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">T-HOME</a>
			</div>
			<a href="{{ url('/subcategoria-60') }}">
				<img src="storage/slider/2.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">T-GAMERS</a>
			</div>
			<a href="{{ url('/subcategoria-61') }}">
				<img src="storage/slider/3.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">T-POWER</a>
			</div>
			<a href="{{ url('/subcategoria-62') }}">
				<img src="storage/slider/4.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">T-MAXIMUS</a>
			</div>
			<a href="{{ url('/subcategoria-63') }}">
				<img src="storage/slider/5.jpg"/>
			</a>
		</li>
	</ul>
	</div>
		</div></div>
<!-- ========================== PC ARMADAS ================================== -->



<!-- ========================== OFERTA PRODUCT ================================== -->
<div class=" col-xs-12 col-sm-12 col-md-3"></div>
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder ">
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">Productos en Oferta</h3>
	</div>


	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
	
	@foreach($hots as $hot)			    	
<div class="item item-carousel">
	<div class="product">

		<div class="product-image">
			<div class="image">
			@if($hot->imagen1 == "sin-foto.jpg")
				<a href="item-detalle-{{ $hot->slug }}"><img src="storage/productos/{{$hot->imagen1}}" data-echo="storage/productos/{{$hot->imagen1}}" class="" alt="" height="150" width="200" ></a>
			@elseif($hot->imagen1 != "sin-foto.jpg")	
				<a href="item-detalle-{{ $hot->slug }}"><img src="{{$hot->imagen1}}" data-echo="{{$hot->imagen1}}" class="" alt="" height="150" width="200" ></a>
			@endif
			</div><!-- /.image -->			
			<div class="tag hot"><span>HOT</span></div>		   
		</div><!-- /.product-image -->
			

		<div class="product-info text-left">
		<h3 class="name"><a href="item-detalle{{ $hot->id }}">{{$hot->descripcion}}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>
			<div class="product-price">	
				<span class="price">${!! $hot->precioventa !!}</span>
				<span class="price-before-discount">${!! $hot->precio2 !!}</span>				
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->


			<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
			@if($hot->stockactual > 0)
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="{{ route('web.AddToCart',['id'=>$hot->id]) }}"	class="btn btn-primary" type="button">Agregar</a>
			</li>  
			@else
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="#"	class="btn btn-danger" type="button">Agotado</a>
			</li>  
			@endif      
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-retweet"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->

	</div><!-- /.product -->
</div><!-- /.item -->

@endforeach
						</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->       
		</div><!-- /.tab-content -->

</div><!-- /.scroll-tabs -->
</div><!-- /.col-xs-12 col-sm-1 -->	
<!-- ========================== OFERTA PRODUCT ================================== -->




@endsection
