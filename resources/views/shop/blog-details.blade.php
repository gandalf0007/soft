@extends('layouts.shop')
@section('content')

	

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row">
			<div class="blog-page">

<!-- ==================BlOG===================================== -->	
@foreach($posts as $post)		
<div class="col-md-9">
<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
	<h1>{{ $post->titulo }}</h1>
	<span class="author">Michael</span>
	<span class="review">6 Comments</span>
	<span class="date-time">{{ $post->created_at }}</span>
	<p>{!! $post->descripcionlarga !!}</p>

	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
</div>
@endforeach
<!-- ==================BlOG===================================== -->



				
			</div>
		</div>
	</div>
</div>


	


@endsection