<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ Request::segment(2)=='home'? 'active' : ''  }}"><a href="/admin/home"><i class='fa fa-home'></i>  <span>Home</span></a></li>
            <li class="{{ Request::segment(2)=='users'? 'active' : ''  }}"><a href="/admin/users"><i class='fa fa-users'></i> <span>Usuarios</span></a></li>
            <li class="{{ Request::segment(2)=='categories'? 'active' : ''  }}"><a href="/admin/categories"><i class='fa fa-link'></i> <span>Categorias</span></a></li>
            <li class="{{ Request::segment(2)=='products'? 'active' : ''  }}"><a href="/admin/products"><i class='fa fa-list'></i> <span>Productos</span></a></li>
            <li class="{{ Request::segment(2)=='orders'? 'active' : ''  }}"><a href="/admin/orders"><i class='fa fa-eur'></i> <span>Pedidos</span></a></li>
            <li class="{{ Request::segment(2)=='albums'? 'active' : ''  }}"><a href="/admin/albums"><i class='fa fa-th'></i> <span>Album</span></a></li>
            <li class="{{ Request::segment(2)=='images'? 'active' : ''  }}"><a href="/admin/images"><i class='fa fa-file-image-o'></i> <span>Imagenes</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
