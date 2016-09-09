@extends('layouts.shopmenu')
@section('content')


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
               	<a data-lightbox="image-1" data-title="Gallery" href="storage/productos/{{$itemdetalle->categoria->nombre}}/{{$itemdetalle->categoriasub->nombre}}/{{$itemdetalle->descripcion}}/{{$itemdetalle->imagen1}}">
                    <img src="storage/productos/{{$itemdetalle->categoria->nombre}}/{{$itemdetalle->categoriasub->nombre}}/{{$itemdetalle->descripcion}}/{{$itemdetalle->imagen1}}" data-echo="storage/productos/{{$itemdetalle->categoria->nombre}}/{{$itemdetalle->categoriasub->nombre}}/{{$itemdetalle->descripcion}}/{{$itemdetalle->imagen1}}" class="img-responsive" alt="" height="200" width="200" >
                </a>

               @endif
            </div><!-- /.single-product-gallery-item -->


			@foreach($imagens as $imagen)
			<div class="single-product-gallery-item" id="{!! $imagen->id !!}">
                <a data-lightbox="image-1" data-title="Gallery" href="storage/productos/{{ $imagen->nombre }}">
                    <img class="img-responsive" alt="" src="storage/productos/{{ $imagen->nombre }}" data-echo="storage/productos/{{ $imagen->nombre }}" />
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
                        <img src="storage/productos/{{$itemdetalle->categoria->nombre}}/{{$itemdetalle->categoriasub->nombre}}/{{$itemdetalle->descripcion}}/{{$itemdetalle->imagen1}}" data-echo="storage/productos/{{$itemdetalle->categoria->nombre}}/{{$itemdetalle->categoriasub->nombre}}/{{$itemdetalle->descripcion}}/{{$itemdetalle->imagen1}}" class="img-responsive" alt=""  width="85" >
                    </a>
               @endif     
                </div>
                
 			      @foreach($imagens as $imagen)   
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $i++ }}" href="#{{$imagen->id}}">
                        <img class="img-responsive" width="85" alt="" src="storage/productos/{{ $imagen->nombre }}" data-echo="storage/productos/{{ $imagen->nombre }}" />
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
				<h1 class="name">{{ $itemdetalle->descripcion }}</h1>
			<!---------- titulo -------------->	 

			<div class="rating-reviews m-t-20">
				<div class="row">
					<div class="col-sm-3">
						<div class="rating rateit-small"></div>
					</div>
					<div class="col-sm-8">
						<div class="reviews">
							<a href="#" class="lnk">(06 Reviews)</a>
						</div>
					</div>
				</div><!-- /.row -->		
			</div><!-- /.rating-reviews -->



<!-------------- Disponibilidad ------------------>	
	<div class="stock-container info-container m-t-10 homebanner-holder">
		<div class="row">
					
<div class="col-sm-9">
	@if($itemdetalle->stockactual > 2)
	<div class="alert alert-success" role="alert"><strong>DISPONIBILIDAD</strong> : ALTO STOCK </div>
	@elseif($itemdetalle->stockactual == 0)
	<div class="alert alert-danger" role="alert"><strong>DISPONIBILIDAD</strong> : SIN STOCK </div>
	@elseif($itemdetalle->stockactual <= 2)
	<div class="alert alert-warning" role="alert"><strong>DISPONIBILIDAD</strong> : POCO STOCK </div>
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
				<span class="price">{!! $itemdetalle->precioventa !!}</span>
				<span class="price-strike">{!! $itemdetalle->precio2 !!}</span>
			</div>
		</div>

	</div><!-- /.row -->
</div><!-- /.price-container -->
<!---------- Precio -------------->	

	<div class="attributes-list outer-top-vs">
		<fieldset class="attribute_fieldset">
			<div class="row">
				<label for="group_2" class="col-sm-2 attribute_label attribute-key">Color&nbsp;</label>
				<div class="col-sm-10 attribute_list">
					<select class="form-control selectpicker attribute_select no-print" id="group_2" name="group_1">
						<option title="Option" selected="selected" >--select--</option>
						<option title="Red" value="1">Red</option>
						<option title="Blue" value="2">Blue</option>
						<option title="Orange" value="3">Orange</option>
					</select>
				</div> <!-- /.attribute_list -->
			</div> 
		</fieldset>
	</div>

	<div class="row outer-top-vs">
		<div class="col-sm-2 col-lg-2 col-md-4">
			<span class="label">Quantity :</span>
		</div>
		<div class="col-sm-3 col-lg-3 col-md-4">
			<input type="text" value="10" class="txt txt-qty">
		</div>
<div class="cart col-md-12 col-lg-6 clearfix animate-effect">
  <div class="action">											
	<button type="button" class="btn btn-primary">Add to cart</button>
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
			<li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
			<li><a href="#" class="fa fa-twitter"></a></li>
			<li><a href="#" class="fa fa-linkedin"></a></li>
			<li><a href="#" class="fa fa-rss"></a></li>
			<li><a href="#" class="fa fa-pinterest"></a></li>
		</ul><!-- /.social-icons -->
		</div>
	</div>
								
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-6 col-md-5 product-info-block -->
					</div><!-- /.row  wow fadeInUp -->



	<div class="product-tabs outer-top-smal  wow fadeInUp">
		
	<ul id="product-tabs" class="nav nav-tabs nav-tab-cell-detail">
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

<div id="review" class="tab-pane">
	<div class="product-tab">

		<div class="product-reviews">
			<h4 class="title">Customer Reviews</h4>

 <div class="reviews">
	<div class="review">
		<div class="review-title"><span class="summary">Best Product For me</span><span class="date"><i class="fa fa-calendar"></i><span>20 minutes ago</span></span></div>
		<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit nisl in adipiscin"</div>
		<div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name">Michael Lee</span></div>						
	</div>
  </div><!-- /.reviews -->
 </div><!-- /.product-reviews -->


<div class="product-add-review">
<h4 class="title">Write your own review</h4>
<div class="review-table">
<div class="table-responsive">
	<table class="table table-bordered">	
		<thead>
			<tr>
				<th class="cell-label">&nbsp;</th>
				<th>1 star</th>
				<th>2 stars</th>
				<th>3 stars</th>
				<th>4 stars</th>
				<th>5 stars</th>
			</tr>
		</thead>	
		<tbody>
			<tr>
				<td class="cell-label">Quality</td>
				<td><input type="radio" name="quality" class="radio" value="1"></td>
				<td><input type="radio" name="quality" class="radio" value="2"></td>
				<td><input type="radio" name="quality" class="radio" value="3"></td>
				<td><input type="radio" name="quality" class="radio" value="4"></td>
				<td><input type="radio" name="quality" class="radio" value="5"></td>
			</tr>
			<tr>
				<td class="cell-label">Price</td>
				<td><input type="radio" name="quality" class="radio" value="1"></td>
				<td><input type="radio" name="quality" class="radio" value="2"></td>
				<td><input type="radio" name="quality" class="radio" value="3"></td>
				<td><input type="radio" name="quality" class="radio" value="4"></td>
				<td><input type="radio" name="quality" class="radio" value="5"></td>
			</tr>
			<tr>
			<td class="cell-label">Value</td>
			<td><input type="radio" name="quality" class="radio" value="1"></td>
			<td><input type="radio" name="quality" class="radio" value="2"></td>
			<td><input type="radio" name="quality" class="radio" value="3"></td>
			<td><input type="radio" name="quality" class="radio" value="4"></td>
			<td><input type="radio" name="quality" class="radio" value="5"></td>
		</tr>
	</tbody>
</table><!-- /.table .table-bordered -->
	</div><!-- /.table-responsive -->
</div><!-- /.review-table -->

											
<div class="review-form">
	<div class="form-container">
		<form role="form" class="cnt-form">

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="exampleInputName">Your Name <span class="astk">*</span></label>
			<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
		</div><!-- /.form-group -->
		<div class="form-group">
			<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
			<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
		</div><!-- /.form-group -->
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="exampleInputReview">Review <span class="astk">*</span></label>
			<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
		</div><!-- /.form-group -->
	</div>
</div><!-- /.row -->

				<div class="action text-right">
					<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
				</div><!-- /.action -->

			</form><!-- /.cnt-form -->
		</div><!-- /.form-container -->
	</div><!-- /.review-form -->
</div><!-- /.product-add-review -->										


	</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->




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