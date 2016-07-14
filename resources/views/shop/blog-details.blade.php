@extends('layouts.shop')
@section('content')

	

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row">
			<div class="blog-page">

<!-- ==================BlOG===================================== -->		
<div class="col-md-9">
<div class="blog-post wow fadeInUp">
	<h1>{{ $post->titulo }}</h1>
	<span class="author">{{ $post->user->nombre }}</span>
	<span class="review">6 Comments</span>
	<span class="date-time">{{ $post->created_at }}</span>
	<p>{!! $post->descripcionlarga !!}</p>

	<div class="social-media">
		<span>share post:</span>
	<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.sharkinformatica.com/blogdetail-post{{ $post->id}}" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="http://www.twitter.com/home?status=https://www.sharkinformatica.com/blogdetail-post{{ $post->id}}"><i class="fa fa-twitter"></i></a>
	<a href="https://plus.google.com/share?url=https://www.sharkinformatica.com/blogdetail-post{{ $post->id}}"><i class="fa fa-google-plus"></i></a>
	
		<span>Like button:</span>
		<iframe src="http://www.facebook.com/plugins/like.php?href=https://www.sharkinformatica.com/&layout=button_count&show_faces=true&width=450&action=like&font=trebuchet+ms&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
		
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<g:plusone size="medium"></g:plusone>


	</div>
</div>


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

<!-- ==================BlOG===================================== -->



				
			</div>
		</div>
	</div>
</div>


	


@endsection