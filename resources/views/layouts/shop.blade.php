<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce, sharkinformatica">
        <meta name="robots" content="all">
        <title>SharkInformatica</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="shop/css/bootstrap.min.css">
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="shop/css/main.css">
        <link rel="stylesheet" href="shop/css/blue.css">
        <link rel="stylesheet" href="shop/css/owl.carousel.css">
        <link rel="stylesheet" href="shop/css/owl.transitions.css">
        <!--<link rel="stylesheet" href="shop/css/owl.theme.css">-->
        <link href="shop/css/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="shop/css/animate.min.css">
        <link rel="stylesheet" href="shop/css/rateit.css">
        <link rel="stylesheet" href="shop/css/bootstrap-select.min.css">
        <!-- Icons/Glyphs -->
        <link rel="stylesheet" type="text/css"  href="shop/css/font-awesome.css">
        <!-- Fonts --> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <!-- Favicon -->
        <link rel="shortcut icon" href="shop/images/favicon.ico">
        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
            <script src="shop/js/html5shiv.js"></script>
            <script src="shop/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="cnt-home">
    

<!-- =================================== HEADER ===================== -->
<header class="header-style-1">
    <!-- =========================== TOP MENU ============================ -->
<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                    <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                    <li><a href="#"><i class="icon fa fa-key"></i>Checkout</a></li>
                    <li><a href="#"><i class="icon fa fa-sign-in"></i>Login</a></li>
                </ul>
            </div><!-- /.cnt-account -->

            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">INR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">German</a></li>
                        </ul>
                    </li>
                </ul><!-- /.list-unstyled -->
            </div><!-- /.cnt-cart -->
            <div class="clearfix"></div>
        </div><!-- /.header-top-inner -->
    </div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ========================== TOP MENU : END ================================ -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                
<!-- =================================== LOGO =========================================== -->
<div class="col-xs-12 col-sm-12 col-md-6 logo-holder">
<div class="logo">
    <a href="home.html">
        @foreach($logos as $logo)
        <img src="storage/paginas/home/logo/{{ $logo->logo }}" alt="">
        @endforeach
    </a>
</div><!-- /.logo -->
</div><!-- /.logo-holder -->
<!-- ================================== LOGO : END ======================= -->              

                
<!-- ======================================== SEARCH AREA ======================================= -->
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <div class="contact-row">
    <div class="phone inline">
        <i class="icon fa fa-phone"></i> (400) 888 888 868
    </div>
    <div class="contact inline">
        <i class="icon fa fa-envelope"></i> saler@unicase.com
    </div>
</div><!-- /.contact-row -->
<div class="search-area">
    <form>
        <div class="control-group">

            <ul class="categories-filter animate-dropdown">
                <li class="dropdown">

                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                    <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Laptops</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Tv & audio</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Gadgets</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Cameras</a></li>

                    </ul>
                </li>
            </ul>

            <input class="search-field" placeholder="Search here..." />

            <a class="search-button" href="#" ></a>    

        </div>
    </form>
</div><!-- /.search-area -->
</div><!-- /.top-search-holder -->
<!-- ================================== SEARCH AREA : END ==================================== -->              

                
<!-- ======================= SHOPPING CART DROPDOWN ======================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
    <div class="dropdown dropdown-cart">
        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
                <div class="total-price-basket">
                    <span class="lbl">cart -</span>
                    <span class="total-price">
                        <span class="sign">$</span>
                        <span class="value">600.00</span>
                    </span>
                </div>
                <div class="basket">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="basket-item-count"><span class="count">2</span></div>
            
            </div>
        </a>
        <ul class="dropdown-menu">
            <li>
                <div class="cart-item product-summary">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="image">
                                <a href="detail.html"><img src="shop/images/cart.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            
                            <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
                            <div class="price">$600.00</div>
                        </div>
                        <div class="col-xs-1 action">
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div><!-- /.cart-item -->
                <div class="clearfix"></div>
            <hr>
        
            <div class="clearfix cart-total">
                <div class="pull-right">
                    
                        <span class="text">Sub Total :</span><span class='price'>$600.00</span>
                        
                </div>
                <div class="clearfix"></div>
                    
                <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
            </div><!-- /.cart-total-->
                    
                
        </li>
        </ul><!-- /.dropdown-menu-->
    </div><!-- /.dropdown-cart -->
</div><!-- /.top-cart-row -->
<!-- ====================== SHOPPING CART DROPDOWN : END======================== -->                
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-header -->



<!-- ============================ NAVBAR ================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
    <div class="nav-outer">
        <ul class="nav navbar-nav">

            <li class="active dropdown yamm-fw">
                <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
            </li>

            <li class="dropdown yamm">
                <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Desktop</a>
            </li>

            <li class="dropdown">
                
                <a href="category.html">Electronics
                   <span class="menu-label hot-menu hidden-xs">hot</span>
                </a>
            </li>

            <li class="dropdown hidden-sm">
                
                <a href="category.html">Television
                    <span class="menu-label new-menu hidden-xs">new</span>
                </a>
            </li>

            <li class="dropdown hidden-sm">
                <a href="category.html">Smart Phone</a>
            </li>

            <li class="dropdown">
                <a href="contact.html">Contact</a>
            </li>
            
            <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
            </li>
            
        </ul><!-- /.navbar-nav -->
        <div class="clearfix"></div>                
    </div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->
</div><!-- /.header-nav -->
<!-- ========================== NAVBAR : END ============================ -->

</header>
<!-- =========================== HEADER : END ================================ -->

  


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
		
		
@yield('content')


	</div><!-- /.row -->
    
	<!-- ===================== Marcas Carrucel======================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<h3 class="section-title">Nuestras Marcas</h3>
		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach($carrucelMarcas as $carrucelMarca)
				<div class="item m-t-15">
					<a href="#" class="image">
						<img src="storage/paginas/home/marcas/{{ $carrucelMarca -> imagen }}" alt="">
					</a>	
				</div><!--/.item-->
			@endforeach
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- =========================== Marcas Carrucel================================ -->


	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->




<!-- ================================= FOOTER ================================ -->
<footer id="footer" class="footer color-bg">
	  <div class="links-social inner-top-sm">
        <div class="container">
            <div class="row">
 

<!-- ======================== Seguinos Facebook ============================= -->
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="latest-tweet">
    <div class="module-heading">
        <h4 class="module-title">Síguenos en Facebook</h4>
    </div><!-- /.module-heading -->
    @foreach( $boxs as $box)
     {!! html_entity_decode($box->box) !!}
    @endforeach
</div><!-- /.contact-timing -->
</div><!-- /.col -->
<!-- ======================== Seguinos Facebook ============================= -->

<!-- ================================= CONTACT INFO  ======================================= -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="contact-info">
    <div class="footer-logo">
        <div class="logo">
            <a href="home.html">
                
                <img src="shop/images/logo.png" alt="">

            </a>
        </div><!-- /.logo -->
    
    </div><!-- /.footer-logo -->

     <div class="module-body m-t-20">
        <p class="about-us"> Nam libero tempore, cum soluta nobis est ses  eligendi optio cumque cum soluta nobis est ses  eligendi optio cumque.</p>
    
        <div class="social-icons">
            
        <a href="http://facebook.com/transvelo" class='active'><i class="icon fa fa-facebook"></i></a>
        <a href="#"><i class="icon fa fa-twitter"></i></a>
        <a href="#"><i class="icon fa fa-linkedin"></i></a>
        <a href="#"><i class="icon fa fa-rss"></i></a>
        <a href="#"><i class="icon fa fa-pinterest"></i></a>

        </div><!-- /.social-icons -->
    </div><!-- /.module-body -->

</div><!-- /.contact-info -->
</div><!-- /.col -->
<!-- ================================= CONTACT INFO : END ======================================= -->            	

            	
<!-- ================================= HORARIOS DE ATENCION================================= -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="contact-timing">
	<div class="module-heading">
		<h4 class="module-title">opening time</h4>
	</div><!-- /.module-heading -->

	<div class="module-body outer-top-xs">
		<div class="table-responsive">
			<table class="table">
				<tbody>
					<tr><td>Monday-Friday:</td><td class="pull-right">08.00 To 18.00</td></tr>
					<tr><td>Saturday:</td><td class="pull-right">09.00 To 20.00</td></tr>
					<tr><td>Sunday:</td><td class="pull-right">10.00 To 20.00</td></tr>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
		<p class='contact-number'>Hot Line:(400)888 868 848</p>
	</div><!-- /.module-body -->
</div><!-- /.contact-timing -->
                </div><!-- /.col -->
<!-- ======================== HORARIOS DE ATENCION : END ========================================= -->




<!-- ============================ INFORMACION ================================== -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="contact-information">
	<div class="module-heading">
		<h4 class="module-title">information</h4>
	</div><!-- /.module-heading -->

	<div class="module-body outer-top-xs">
        <ul class="toggle-footer" style="">
        @foreach( $informacions as $informacion)
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">

<p>{{ $informacion->direccion1 }}<br>{{ $informacion->direccion2 }}<br>{{ $informacion->direccion3 }}</p>
                    
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
        <p>{{$informacion->telefono1}}<br>{{$informacion->telefono2}}<br>{{$informacion->telefono3}}</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                <span><a href="#">{{ $informacion->correo1 }}</a></span><br>
                <span><a href="#">{{ $informacion->correo2 }}</a></span><br>
                <span><a href="#">{{ $informacion->correo3 }}</a></span>
                </div>
            </li>
             @endforeach  
            </ul>
    </div><!-- /.module-body -->
</div><!-- /.contact-timing -->
</div><!-- /.col -->
<!-- ============================ INFORMACION ================================== -->
           	
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.links-social -->

    <div class="footer-bottom inner-bottom-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading outer-bottom-xs">
                        <h4 class="module-title">category</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li><a href="#">Order History</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Libero Sed rhoncus</a></li>
                            <li><a href="#">Venenatis augue tellus</a></li>
                            <li><a href="#">My Vouchers</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading outer-bottom-xs">
                        <h4 class="module-title">my account</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Customer Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="#">Search Terms</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading outer-bottom-xs">
                        <h4 class="module-title">our services</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li><a href="#">Order History</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Libero Sed rhoncus</a></li>
                            <li><a href="#">Venenatis augue tellus</a></li>
                            <li><a href="#">My Vouchers</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading outer-bottom-xs">
                        <h4 class="module-title">help & support</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li><a href="#">Knowledgebase</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Contact Support</a></li>
                            <li><a href="#">Marketplace Blog</a></li>
                            <li><a href="#">About Unicase</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="copyright">
                   Copyright © 2014
                    <a href="home.html">Unicase Shop.</a>
                    - All rights Reserved
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="shop/images/payments/1.png" alt=""></li>
                        <li><img src="shop/images/payments/2.png" alt=""></li>
                        <li><img src="shop/images/payments/3.png" alt=""></li>
                        <li><img src="shop/images/payments/4.png" alt=""></li>
                        <li><img src="shop/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="shop/js/jquery-1.11.1.min.js"></script>
	<script src="shop/js/bootstrap.min.js"></script>
	<script src="shop/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="shop/js/owl.carousel.min.js"></script>
	<script src="shop/js/echo.min.js"></script>
	<script src="shop/js/jquery.easing-1.3.min.js"></script>
	<script src="shop/js/bootstrap-slider.min.js"></script>
    <script src="shop/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="shop/js/lightbox.min.js"></script>
    <script src="shop/js/bootstrap-select.min.js"></script>
    <script src="shop/js/wow.min.js"></script>
	<script src="shop/js/scripts.js"></script>


</body>
</html>