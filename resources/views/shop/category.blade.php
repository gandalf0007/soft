@extends('layouts.shopmenu')
@section('content')
@include('alerts.success')

<div class="body-content outer-top-xs cnt-home">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			

			<div class='col-md-9'>
				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									

@foreach($itemdetalles as $itemdetalle)	
<div class="col-sm-6 col-md-4 wow fadeInUp">
	<div class="products">

	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="item-detalle{{ $itemdetalle->id }}"><img  src="storage/productos/{{ $itemdetalle->imagen1 }}" data-echo="storage/productos/{{ $itemdetalle->imagen1 }}" alt=""></a>
			</div><!-- /.image -->			
			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		<div class="product-info text-left">
			<h3 class="name"><a href="item-detalle{{ $itemdetalle->id }}">{!! $itemdetalle->descripcion !!}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>
			<div class="product-price">	
			<span class="price">{!! $itemdetalle->precioventa !!}</span>
			<span class="price-before-discount">{!! $itemdetalle->precio2 !!}</span>					
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->

<div class="cart clearfix animate-effect">
	<div class="action">
		<ul class="list-unstyled">
			<li class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
				<i class="fa fa-shopping-cart"></i>			
				</button>
				<a href="{{ route('web.AddToCart',['id'=>$itemdetalle->id]) }}"	class="btn btn-primary" type="button">Add to cart</a>
			</li>        
		    <li class="lnk wishlist">
			 	<a class="add-to-cart" href="#" title="Wishlist">
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
     


	</div><!-- /.products -->
</div><!-- /.item -->
	 @endforeach
		
		
									</div><!-- /.row -->
								</div><!-- /.category-product -->
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-pane #list-container -->
					</div><!-- /.tab-content -->
				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
		


@endsection