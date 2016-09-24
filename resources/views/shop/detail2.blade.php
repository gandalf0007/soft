@extends('layouts.shopmenu')
@section('content')
<!-- ===================== facebook share ======================= -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=1529659150661681";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- ===================== facebook share: END ======================= -->



<div class="col-xs-12 col-sm-12 col-md-9 ">
<div class="body-content outer-top-xs cnt-homepage">
	<div class='container'>
		<div class="homepage-container">
			<div class='row single-product outer-bottom-sm '>
			
<!-- ===================== COLOR: END ======================= -->

<br><br>		<br><br>		
<div class='col-md-9 '>


  <div class="row  wow fadeInUp">
	<div class="col-xs-12 col-sm-6 col-md-7 gallery-holder">
      <div class="product-item-holder size-big single-product-gallery small-gallery">
<!----------- imagen portada ------------>
        <div id="owl-single-product">

			<div class="single-product-gallery-item" id="slide">
			<!-- si es sin foto cargo la foto por defecto -->
			@if($itemdetalle->imagen1 == "sin-foto.jpg")
                <a data-lightbox="image-1" data-title="Gallery" href="storage/productos/{{$itemdetalle->imagen1}}">
                    <img src="storage/productos/{{$itemdetalle->imagen1}}" data-echo="storage/productos/{{$itemdetalle->imagen1}}" class="img-responsive" alt="" height="200" width="200" >
                </a>
                 <!-- caso contrario cargo la foto -->
               @elseif($itemdetalle->imagen1 != "sin-foto.jpg")
               	<a data-lightbox="image-1" data-title="Gallery" href="{{$itemdetalle->imagen1}}">
                    <img src="{{$itemdetalle->imagen1}}" data-echo="{{$itemdetalle->imagen1}}" class="img-responsive" alt="" height="200" width="200" >
                </a>

               @endif
            </div><!-- /.single-product-gallery-item -->


			@foreach($imagens as $imagen)
			<div class="single-product-gallery-item" id="{!! $imagen->id !!}">
                <a data-lightbox="image-1" data-title="Gallery" href="storage/productos/{{$imagen->producto->categoria->nombre}}/{{$imagen->producto->categoriasub->nombre}}/{{$imagen->producto->descripcion}}/{{$imagen->nombre}}">
                    <img class="img-responsive" alt="" src="storage/productos/{{$imagen->producto->categoria->nombre}}/{{$imagen->producto->categoriasub->nombre}}/{{$imagen->producto->descripcion}}/{{$imagen->nombre}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
			@endforeach
        </div><!-- /.single-product-slider -->
<!----------- imagen portada ------------>

<?php $i=0; ?>
 <!----------- imagen carrucel ------------>  
        <div class="single-product-gallery-thumbs second-gallery-thumb gallery-thumbs">
            <div id="owl-single-product2-thumbnails">

            <div class="item">
            <!-- si es sin foto cargo la foto por defecto -->
            @if($itemdetalle->imagen1 == "sin-foto.jpg")
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $i++ }}" href="#">
                        <img src="storage/productos/{{$itemdetalle->imagen1}}" data-echo="storage/productos/{{$itemdetalle->imagen1}}" class="img-responsive" alt=""  width="85" >
                    </a>
                    <!-- caso contrario cargo la foto -->
               @elseif($itemdetalle->imagen1 != "sin-foto.jpg")
               		<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $i++ }}" href="#">
                        <img src="{{$itemdetalle->imagen1}}" data-echo="{{$itemdetalle->imagen1}}" class="img-responsive" alt=""  width="85" >
                    </a>
               @endif     
                </div>
                
 			      @foreach($imagens as $imagen)   
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $i++ }}" href="#{{$imagen->id}}">
                        <img class="img-responsive" width="85" alt="" src="storage/productos/{{$imagen->producto->categoria->nombre}}/{{$imagen->producto->categoriasub->nombre}}/{{$imagen->producto->descripcion}}/{{$imagen->nombre}}" />
                    </a>
                </div>
              @endforeach 
            </div><!-- /#owl-single-product-thumbnails -->

         <div class="nav-holder left">
                <a class="prev-btn slider-prev" data-target="#owl-single-product2-thumbnails" href="#prev"></a>
            </div><!-- /.nav-holder -->
             <div class="nav-holder right">
                <a class="next-btn slider-next" data-target="#owl-single-product2-thumbnails" href="#next"></a>
            </div><!-- /.nav-holder -->
            </div><!-- /.gallery-thumbs -->
 <!----------- imagen carrucel ------------> 


    </div><!-- /.single-product-gallery -->
</div><!-- /.col-xs-12 col-sm-6 col-md-7 gallery-holder -->	 



<div class='col-sm-6 col-md-5 product-info-block '>
  <div class="product-info">
			<!---------- titulo -------------->	 
				<h1 class="name text-left">{{ $itemdetalle->descripcion }}</h1>
			<!---------- titulo -------------->	 

			<div class="rating-reviews m-t-20">
				<div class="row">
					<div class="col-sm-6">
					@for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $itemdetalle->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($itemdetalle->rating_cache, 1)}} stars
					</div>
					<div class="col-sm-6">
						<div class="reviews">
						<p class="lnk">({{$itemdetalle->rating_count}}  Reviews)</p>
						</div>
					</div>
				</div><!-- /.row -->		
			</div><!-- /.rating-reviews -->



<!-------------- Disponibilidad ------------------>	
	<div class="stock-container info-container m-t-10 homebanner-holder">
		<div class="row">
					
<div class="col-sm-9">
	@if($itemdetalle->stockactual > 2)
	<div class="alert alert-success" role="alert"><strong>DISPONIBILIDAD</strong> : {!!$itemdetalle->stockactual !!} </div>
	@elseif($itemdetalle->stockactual == 0)
	<div class="alert alert-danger" role="alert"><strong>DISPONIBILIDAD</strong> : {!!$itemdetalle->stockactual !!}</div>
	@elseif($itemdetalle->stockactual <= 2)
	<div class="alert alert-warning" role="alert"><strong>DISPONIBILIDAD</strong> : {!!$itemdetalle->stockactual !!}</div>
	@endif
</div>				
		</div><!-- /.row -->	
	</div><!-- /.stock-container -->
<!-------------- Disponibilidad ------------------>		

	<!---------- descripcion corta -------------->	
			<div class="description-container m-t-20">
				{!! $itemdetalle->descripcioncorta !!}
			</div><!-- /.description-container -->
	<!---------- descripcion corta -------------->	

	<!---------- Precio -------------->	
	<div class="price-container info-container m-t-20">
		<div class="row">
									
		<div class="col-sm-6">
			<div class="price-box">
				<span class="price">${!! $itemdetalle->precioventa !!}</span>
				<span class="price-strike">${!! $itemdetalle->precio2 !!}</span>
			</div>
		</div>

	</div><!-- /.row -->
</div><!-- /.price-container -->
<!---------- Precio -------------->	

	

	<div class="row outer-top-vs">
		
<div class="cart col-md-12 col-lg-6 clearfix animate-effect">
  <div class="action">
  @if($itemdetalle->stockactual > 2)
	<a href="{{ route('web.AddToCart',['id'=>$itemdetalle->id]) }}"	class="btn btn-success icon" type="button">
	<i class="fa fa-shopping-cart"></i> AGREGAR</a>
   @elseif($itemdetalle->stockactual == 0)							
	<a href="#"	class="btn btn-danger icon" type="button">
	<i class="fa fa-shopping-cart"></i> AGOTADO</a>
	@elseif($itemdetalle->stockactual <= 2)
	<a href="{{ route('web.AddToCart',['id'=>$itemdetalle->id]) }}"	class="btn btn-warning icon" type="button">
	<i class="fa fa-shopping-cart"></i> AGREGAR</a>
	@endif

	<button type="button" class="left btn btn-primary"><i class="icon fa fa-heart"></i></button>
	<button type="button" class="left btn btn-primary"><i class="fa fa-retweet"></i></button>
  </div><!-- /.action -->
</div>
	</div>

	<div class="row product-social-link outer-top-vs">
		<div class="col-md-3 col-sm-3">
			<span class="label">Share </span>
        </div>
		<div class=" col-md-9 col-sm-9 social-icons">
		<ul class="list-inline">
		<div class="fb-share-button" data-href="http://sharkinformatica.com/item-detalle-{{$itemdetalle->slug}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fsharkinformatica.com%2F&amp;src=sdkpreparse">Compartir</a></div>
			
			<li><a href="#" class="fa fa-twitter"></a></li>
			<li><a href="#" class="fa fa-linkedin"></a></li>
			<li><a href="#" class="fa fa-rss"></a></li>
			
		</ul><!-- /.social-icons -->
		</div>
	</div>
								
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-6 col-md-5 product-info-block -->
					</div><!-- /.row  wow fadeInUp -->



	<div class=" product-tabs outer-top-smal  wow fadeInUp">
		
	<ul id="product-tabs" class="homepage-container nav nav-tabs nav-tab-cell-detail">
		<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
		<li><a data-toggle="tab" href="#review">REVIEW</a></li>
		<li><a data-toggle="tab" href="#tags">COMENTARIOS</a></li>
	</ul><!-- /.nav-tabs #product-tabs -->
			<br><br>				
	<div class="tab-content outer-top-xs">

						<!----------- descripcion larga ---------->
							<div id="description" class="tab-pane in active">
								<div class="product-tab">
									{!! $itemdetalle->descripcionlarga !!}
								</div>	
							</div><!-- /.tab-pane -->
						<!----------- descripcion larga ---------->



<!----------- REVIEWS ---------->
<div id="review" class="tab-pane">
	<div class="product-tab">
		
@if (Auth::check())
	
<div class="row">
        <div class="col-md-9">
            <div class="thumbnail">
              <div class="ratings">
                  <p class="pull-right">{{$itemdetalle->rating_count}} Reviews</p>
                  <p>
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $itemdetalle->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($itemdetalle->rating_cache, 1)}} stars
                  </p>
              </div>
            </div>
            <div class="well container" id="reviews-anchor">
              <div class="row">
                <div class="col-md-12">
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>There were errors while submitting this review:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been posted!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been removed!</h5>
                    </div>
                  @endif
                </div>
              </div>
              <div class="text-right">
                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">

{!!Form::model($itemdetalle,['url'=>['review',$itemdetalle->slug],'method'=>'POST' , 'files'=>True])!!}
     {!!Form::hidden('rating', null, ['id'=>'ratings-hidden'])!!}
     {!!Form::textarea('comment', null,['id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'])!!}
          <div class="text-right">
             <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                 <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
               <button class="btn btn-success btn-lg" type="submit">Save</button>
           </div>
 {!!Form::close()!!}
                </div>
              </div>

              @foreach($reviews as $review)
              <hr>
                <div class="row">
                  <div class="col-md-12">
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor

                    {{ $review->user ? $review->user->nombre : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 
                    
                    <p>{{{$review->comment}}}</p>
                  </div>
                </div>
              @endforeach
              {{ $reviews->links() }}
            </div>
        </div>

    </div>
@else
<p class="h3">Tiene que estar <strong class="text-danger">Registrado</strong> para poder hacer las criticas</p>
@endif
	</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

<!----------- REVIEWS END ---------->






<!---------------- COMENTARIO ------------------>
			<div id="tags" class="tab-pane">
				<div class="product-tag">

					<h4 class="title">Comentarios</h4>
						<div class="form-container">


<div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */
    /*
    var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        
        s.src = '//sharkinformatica.disqus.com/embed.js';
        
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>


						</div><!-- /.form-container -->
				</div><!-- /.product-tab -->
<!---------------- COMENTARIO ------------------>


		</div><!-- /.tab-content -->
	</div><!-- /.product-tabs -->
</div><!-- /.col -->
				</div><!-- /.row -->
		</div><!-- /.homepage-container -->
	</div><!-- /.container -->
</div><!-- /.body-content -->					
</div><!-- /.col-xs-12 col-sm-12 col-md-9 -->	

@endsection