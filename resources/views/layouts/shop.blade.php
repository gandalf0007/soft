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
        
        {!!Html::style('shop/css/main.css')!!}
        {!!Html::style('shop/css/myaccount.css')!!}
        {!!Html::style('shop/css/radiobutton.css')!!}
        <link rel="stylesheet" href="shop/css/checkout.css">
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
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="storage/favicon.ico">
       
       {!!Html::style('css/login.css')!!}
         
        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
            <script src="shop/js/html5shiv.js"></script>
            <script src="shop/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="cnt-home" >
    

<!-- =================================== HEADER ===================== -->
<header class="header-style-1 header-style-2">
    <!-- =========================== TOP MENU ============================ -->
<div class="top-bar container animate-dropdown">
    <div class="container">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled ">

                @if (Auth::guest())
                <button type="button" class="btn btn-azul"  data-toggle="modal" data-target="#loginModal">  <li><i class=" fa fa-sign-in"></i>Login</li></button>
                @else

 {{HTML::image('storage/user/'.Auth::user()->path,'img', array('class'=>'imagecircel'))}}
               <li><a href="{{ url('/myaccount-perfil') }}"><i class="icon fa fa-user"></i>My Account</a></li>
                <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                <li><a href="{{ url('/web-shopping-cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                <li><a href="{{ url('/checkout') }}"><i class="icon fa fa-key"></i>Checkout</a></li>
                <li><a href="{{ url('/logout') }}"><i class="icon fa fa-sign-in"></i>Salir</a></li>

                @endif

                </ul>
            </div><!-- /.cnt-account -->

           
            <div class="clearfix"></div>
        </div><!-- /.header-top-inner -->
    </div><!-- /.container -->
</div><!-- /.header-top -->

<!-- ========================== TOP MENU : END ================================ -->
    <div class="main-header ">
        <div class="container blanco ">
            <div class="row blanco ">
                <br>
<!-- =================================== LOGO =========================================== -->
<div class="col-xs-12 col-sm-12 col-md-5 logo-holder ">
<div class="logo">
    <a href="/">
        @foreach($logos as $logo)
        <img class="img-responsive" src="storage/paginas/home/logo/{{ $logo->logo }}" alt="">
        @endforeach
    </a>
</div><!-- /.logo -->
</div><!-- /.logo-holder -->
<!-- ================================== LOGO : END ======================= -->              

                
<!-- ======================================== SEARCH AREA ======================================= -->
<div class="col-xs-12 col-sm-12 col-md-5 top-search-holder">
<div class="contact-row">
 @foreach($informacions as $informacion)
    <div class="phone inline">
        <i class="icon fa fa-phone"></i> {{ $informacion->telefono1 }}
    </div>
    <div class="contact inline">
        <i class="icon fa fa-envelope"></i> {{ $informacion->correo1 }}
    </div>
     @endforeach
</div><!-- /.contact-row -->
<div class="search-area">
<!--buscador-->
{!!Form::open(['url'=>'buscador', 'method'=>'GET' , 'class'=>'' , 'role'=>'Search'])!!}

<div class="control-group">
{!!Form::text('descripcion',null,['class'=>'search-field','placeholder'=>'Descripcion'])!!}

 <button type="submit" class="search-button btn"> Buscar </button>
 </div>
{!!Form::close()!!}
 <!--endbuscador--> 
</div><!-- /.search-area -->
</div><!-- /.top-search-holder -->
<!-- ================================== SEARCH AREA : END ==================================== -->              

                
<!-- ======================= SHOPPING CART DROPDOWN ======================================== -->
<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
    <div class="dropdown dropdown-cart">
        <a href="{{ url('/web-shopping-cart') }}" class="dropdown-toggle lnk-cart" >
            <div class="items-cart-inner">
                <div class="total-price-basket">
                    <span class="lbl">cart -</span>
                    <span class="total-price">
                        <span class="sign">$</span>
                        <span class="value">{!! $total !!}</span>
                    </span>
                </div>
                <div class="basket">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="basket-item-count"><span class="count">{{ $cartcount }}</span></div>
            
            </div>
        </a>
    </div><!-- /.dropdown-cart -->
</div><!-- /.top-cart-row -->
<!-- ====================== SHOPPING CART DROPDOWN : END======================== -->                
            </div><!-- /.row -->
        </div><!-- /.container -->
       
    </div><!-- /.main-header -->



<!-- ============================ NAVBAR ================================== -->
<div class="header-nav animate-dropdown blanco">
    <div class="container blanco ">
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
                <a href="{!! URL::to('/') !!}">Home</a>
            </li>
            
            <li class=" dropdown yamm-fw">
                <a href="{!! URL::to('blog/') !!}">BLOG</a>
            </li>

            <li class="dropdown hidden-sm">
                <a href="nosotros.html">Nosotros</a>
            </li>

            <li class="dropdown">
                <a href="ubicacion">Ubicacion</a>
            </li>
            
            <li class="dropdown hidden-sm">
                <a href="preguntas-frecuentes">FAQ</a>
            </li>

            <li class="dropdown">
                <a href="contacto">Contacto</a>
            </li>

            @if (Auth::guest())
            <li class="dropdown">
                <a  data-toggle="modal" data-target="#registrarse" id="#registrarse">Registrarse<span class="menu-label hot-menu hidden-xs">hot</span></a>
            </li>
            @endif
            
            
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

  


<div class="body-content outer-top-xs " id="top-banner-and-menu">
    <div class="container blanco">
    <div class="row blanco mypadding">
    

@yield('content')
    


   
   
    <!-- ===================== Marcas Carrucel======================== -->
<div class="col-xs-12 col-sm-12 col-md-12 "> 
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
</div><!-- /.container -->
<!-- =========================== Marcas Carrucel================================ -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->




<!-- ================================= FOOTER ================================ -->
<footer id="footer" class="footer color-bg">
      <div class="links-social">
        <div class="container blanco">
            <div class="row blanco">
 

<!-- ======================== Seguinos Facebook ============================= -->
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="latest-tweet">
    <div class="module-heading">
        <h4 class="module-title">Síguenos en Facebook</h4>
    </div><!-- /.module-heading -->
    @foreach( $boxs as $box)
    <div class="flex-video widescreen ">
     {!! html_entity_decode($box->box) !!}
     </div>
    @endforeach
</div><!-- /.contact-timing -->
</div><!-- /.col -->
<!-- ======================== Seguinos Facebook ============================= -->

<!-- ================================= CONTACT INFO  ======================================= -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="contact-info">
<div class="module-heading">
        <h4 class="module-title">Medios de Pago</h4>
    </div><!-- /.module-heading -->
    <div class="footer-logo">
        <div class="logo">
            <a href="{{asset('/formas-de-pago')}}">
                
                <img class="img-responsive" src="storage/footer/formas-de-pago.jpg" alt="">

            </a>
        </div><!-- /.logo -->
    
    </div><!-- /.footer-logo -->
<br>
     <div class="module-body m-t-20">
        
    
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

<!-- ======================== HORARIOS DE ATENCION : END ========================================= -->




<!-- ============================ INFORMACION ================================== -->
<div class="col-xs-12 col-sm-6 col-md-3 blanco">
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
         <p>Telefono : {{$informacion->telefono1}}<br>
           Telefono : {{$informacion->telefono2}}<br>
           {{$informacion->telefono3}}</p>
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
                        <h4 class="module-title">Ayuda & Soporte</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li><a href="preguntas-frecuentes">Preguntas Frecuentes</a></li>
                          <li><a href="formas-de-pago">Formas De Pago</a></li>
                          <li><a href="garantia">Garantia y Devoluciones</a></li>
                          <li><a href="aviso-legal">Aviso Legal</a></li>
                          <li><a href="envios">Envios</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                   <div class="contact-timing">
    <div class="module-heading">
        <h4 class="module-title">Hora de Apertura</h4>
    </div><!-- /.module-heading -->

    <div class="module-body outer-top-xs">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><td>Lunes-Viernes:</td><td class="pull-right">08.00 a 13:00</td></tr>
                    <tr><td>Lunes-Viernes:</td><td class="pull-right">16:00 a 20:00</td></tr>
                    <tr><td>Sabados:</td><td class="pull-right">08:00 To 15:00</td></tr>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /.module-body -->
</div><!-- /.contact-timing -->


                </div>

            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-3 no-padding">
                <div class="copyright">
                   Copyright © 2016
                    <a href="home.html">SharkInformatica</a>
                    - All rights Reserved
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                       <li><img class="img-responsive" src="storage/footer/mercadopago.jpg" alt=""></li>  
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/pinterest_grid.js"></script>
    <script src="shop/js/bootstrap.min.js"></script>
   <!--  <script src="shop/js/checkout.js"></script> -->
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
    @yield('scriptdatepicker')
    <!--sweetalert-->
    <script src="js/sweetalert/sweetalert.min.js"></script>
    <script src="js/sweetalert/sweetalert-dev.js"></script>
    @include('sweet::alert')
    <!--sweetalert end-->

    <!--modal-->
    @include('shop.modal.login') 
    @include('shop.modal.registro') 
    <!--modal end-->


<!--facebook pop up -->
<script type='text/javascript'>
//<![CDATA[
jQuery.cookie = function (key, value, options) {
 
// key and at least value given, set cookie...
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);
 
if (value === null || value === undefined) {
options.expires = -1;
}
 
if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}
 
value = String(value);
 
return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}
 
// key and possibly options given, get cookie...
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
//]]>
</script>
<script type='text/javascript'>
jQuery(document).ready(function($){
if($.cookie('popup_user_login') != 'yes'){
$('#fanback').delay(1000).fadeIn('medium');
$('#TheBlogWidgets, #fan-exit').click(function(){
$('#fanback').stop().fadeOut('medium');
});
}
$.cookie('popup_user_login', 'yes', { path: '/', expires: 7 });
});
</script>
<!--facebook pop up end-->

 <!--Chat-->
  <script type="text/javascript">
var _videodesk= _videodesk || {};
_videodesk['firstname'] = '' ;
_videodesk['lastname'] = '' ;
_videodesk['company'] = '' ;
_videodesk['email'] = '' ;
_videodesk['phone'] = '' ;
_videodesk['customer_lang'] = '' ;
_videodesk['customer_id'] = '' ;
_videodesk['customer_url'] = '' ;
_videodesk['cart_id'] = '' ;
_videodesk['cart_url'] = '' ;
_videodesk['uid'] = '75ce0d2b962e695d4fda3f967bbbb0d0' ;
_videodesk['lang'] = 'es' ;
(function() {
var videodesk = document.createElement('script'); videodesk.type = 'text/javascript'; videodesk.async = true;
videodesk.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'module-videodesk.com/js/videodesk.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(videodesk, s);
})();
</script>
  <!--Chat END-->

</body>
</html>