<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Soft Shark</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">



{!!Html::style('css/bootstrap.min.css')!!}
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/bootstrap-responsive.min.css')!!}
{!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600')!!}
{!!Html::style('css/style.css')!!}
{!!Html::style('css/pages/dashboard.css')!!}
{!!Html::style('css/font-awesome.css')!!}
{!!Html::style('css/font-awesome.min.css')!!}



   
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Soft Shark</a>
        <!--comprueva si esta logueado y se carga el panel de user-->
        @if (Auth::check())
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon-user"></i> {{ Auth::user()->usu_nombre }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul>
          </li>

        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      @endif
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">


        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-shopping-basket"></i><span>Productos</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a class="fa fa-plus-square" href="{!! URL::to('producto/create') !!}"> Agregar Producto</a></li>
        <li><a class="fa fa-list-ul"href="{!! URL::to('producto/') !!}"> Listar Productos</a></li>
        </ul>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user-secret"></i><span>Provedores</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a class="fa fa-user-plus" href="{!! URL::to('provedor/create') !!}"> Agregar Provedor</a></li>
        <li><a class="fa fa-users"href="{!! URL::to('provedor/') !!}"> Listar Provedores</a></li>
        </ul>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i><span>Usuarios</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a class="fa  fa-user-plus" href="{!! URL::to('usuario/create') !!}"> Crear Usuarios</a></li>
        <li><a class="fa fa-users"href="{!! URL::to('usuario/') !!}"> Listar Usuarios</a></li>
        </ul>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-desktop"></i><span>Config</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a class="fa  fa-cubes" href="{!! URL::to('rubro/') !!}">  Rubros</a></li>
        <br><!--salto de linea-->
        <li><a class="fa  fa-eur" href="{!! URL::to('ivatipo/') !!}">  Iva Tipo</a></li>
        <br><!--salto de linea-->
        <li><a class="fa  fa-tags" href="{!! URL::to('marca/') !!}">  Marca</a></li>
        <br><!--salto de linea-->
        <li><a class="fa  fa-car" href="{!! URL::to('transporte/') !!}">  Transporte</a></li>
        </ul>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i><span>Clientes</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a class="fa  fa-cubes" href="{!! URL::to('cliente/') !!}">Listar Clientes</a></li>
        <br><!--salto de linea-->
        </ul>
        </li>



        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-trash"></i><span>Reportes</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li class="active"><a href="{!! URL::to('reportes/') !!}" ><i class="fa fa-circle-o"></i> Listar Reportes </a></li>

        


      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">


          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Soft Shark Bienvenido</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">

                  
                   @yield('content')
                  
                </div>
                <!-- /widget-content --> 
              </div>
            </div>
          </div>


          
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
{!!Html::script('js/jquery-1.7.2.min.js')!!}
{!!Html::script('js/excanvas.min.js')!!}
{!!Html::script('js/chart.min.js')!!}
{!!Html::script('js/bootstrap.js')!!}
{!!Html::script('js/base.js')!!}
{!!Html::script('js/pdf.js')!!}


</body>
</html>
