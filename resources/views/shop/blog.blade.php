
@extends('layouts.shop')
@section('content')


	<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row">
			<div class="blog-page">

<!-- ==================BlOG===================================== -->	
<div class="col-md-9">
@foreach($posts as $post)	
<div class="blog-post wow fadeInUp">
	<h1>{{ $post->titulo }}</h1>
	<span class="author">Michael</span>
	<span class="review">6 Comments</span>
	<span class="date-time">{{ $post->created_at }}</span>
	<p>{!! $post->descripcioncorta !!}</p>

	{!! link_to_route('paginas.postDetalle', $title = 'Leer Mas', $parameters = $post->id  , $attributes = ['class'=>'btn btn-primary']); !!}

</div>
<br><br>
@endforeach

 {!! $posts->render() !!}
<!-- ==================BlOG===================================== -->



				
			</div>
		</div>
	</div>
</div>
</div>

		


@endsection