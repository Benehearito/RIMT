<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ Html::image('theme/logo.gif', "Imagen no encontrada", array('class' => 'img-responsive img-rounded bg-logo-nav', 'title' => 'JoyzaCosmetics')) }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/home">Inicio</a></li>
                <li><a href="/servicios">Servicios</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/proyectos">Proyectos</a></li>
                <li><a href="/videos">Videos</a></li>
                <li><a href="/contacto">Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/carrito"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Carrito €</a></li>
                    <li><a href="/login"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Login / Registro</a></li>
                @else
                    <li><a href="/carrito"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Carrito €</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>