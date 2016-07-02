<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar5.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ url('admin') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>



        <li class="treeview">
                <a href="#"><i class='fa fa-desktop'></i> <span>Config</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a  href="{!! URL::to('rubro/') !!}">Rubros</a></li>
                    <li><a  href="{!! URL::to('ivatipo/') !!}">Iva Tipo</a></li>
                    <li><a  href="{!! URL::to('marca/') !!}">Marca</a></li>
                    <li><a  href="{!! URL::to('transporte/') !!}">Transporte</a></li>
                </ul>
        </li>

         <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a  href="{!! URL::to('venta-show/') !!}">Generar Venta</a></li>
                    <li><a  href="{!! URL::to('presupuesto-show/') !!}">Generar Presupuesto</a></li>
                    <li><a  href="{!! URL::to('listar-venta/') !!}">Listar</a></li>
                    
                </ul>
        </li>


        <li >
        <a href="{!! URL::to('producto/') !!}">
        <i class='fa fa-shopping-basket'></i><span>Productos</span></a>
        </li>

        <li >
        <a href="{!! URL::to('provedor/') !!}">
        <i class='fa fa-user-secret'></i><span>Provedores</span></a>
        </li>

        <li >
        <a href="{!! URL::to('usuario/') !!}">
        <i class='fa fa-user'></i><span>Usuarios</span></a>
        </li>

        <li >
        <a href="{!! URL::to('cliente/') !!}">
        <i class='fa fa-users'></i><span>Clientes</span></a>
        </li>

        <li >
        <a href="{!! URL::to('reportes/') !!}">
        <i class='fa fa-circle-o'></i><span>Reportes</span></a>
        </li>

         <li >
        <a href="{!! URL::to('gasto/') !!}">
        <i class='fa fa-money'></i><span>Gastos</span></a>
        </li>  
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
