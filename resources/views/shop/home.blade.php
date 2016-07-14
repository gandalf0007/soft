@extends('layouts.shop')
@include('alerts.errors')
@section('content')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

		

<!-- ================================== MENU ================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
      <ul class="nav">
		@foreach($categorias as $categoria)<!----------foreach categorias---------->
			 
	<li class="dropdown menu-item">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa {{$categoria->icon}} fa-fw"><img src="storage/categorias/{{$categoria->icon}}"></i>
     {{ $categoria -> nombre}}</a>

	@if(DB::table('categoriasubs')->where('categoria_id','=',$categoria->id)->get())
	<ul class="dropdown-menu mega-menu">

	@foreach($subcategorias as $subcategoria)
	@if($categoria->id == $subcategoria->categoria_id)
	<li class="yamm-content">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-4">
				<ul><li><a href="#">{{ $subcategoria->nombre }}</a></li></ul>	
			</div>
			<div class="dropdown-banner-holder">
                <a href="#"><img alt="" src="storage/banner/{{ $categoria->banner }}" /></a>
           	</div>
        </div><!-- /.row -->
     </li><!-- /.yamm-content --> 
  	@endif
    @endforeach   

   </ul><!-- /.dropdown-menu --> 	
  	@endif
   </li><!-- /.menu-item -->	
	
		  
		@endforeach	 <!----------endforeach categorias---------->
   	</ul><!-- /.nav -->	  
  </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
</div><!-- /.sidemenu-holder -->
<!-- ================================== MENU ================================== -->


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
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">Nuevos Productos</h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
			<li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">smartphone</a></li>
			<li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">laptop</a></li>
			<li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">apple</a></li>
		</ul><!-- /.nav-tabs -->
	</div>


	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
				    	
<div class="item item-carousel">
	<div class="product">

		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="storage/paginas/home/carrucel/" alt=""></a>
			</div><!-- /.image -->			
			<div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			

		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Sony Ericson Vaga</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>
			<div class="product-price">	
				<span class="price">$650.99</span>
				<span class="price-before-discount">$ 800</span>				
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->


			<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>								
							</button>
							<button class="btn btn-primary" type="button">Add to cart</button>
						</li>
	                   
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
						</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->       
		</div><!-- /.tab-content -->

</div><!-- /.scroll-tabs -->
</div><!-- /.col-xs-12 col-sm-1 -->	
<!-- ========================== NEW PRODUCT ================================== -->



		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
