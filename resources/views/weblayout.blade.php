<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Reformas integrales microcemento Tenerife</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    @yield('style')

    <!-- Custom styles for this template -->
    <link href="/css/web.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@include('web.partials.head')

        <!-- Main jumbotron for a primary marketing message or call to action -->
@yield('content_primary')

@yield('content_secundary')




</div> <!-- /container -->
<footer>
    <div class="navbar">
        <div class="container">
            <ul class="nav navbar-nav navbar-footer">
                <li><a href="/preguntas-frecuentes">Preguntas frecuentes <i class="fa fa-question-circle"></i></a></li>
                <li><a href="/condiciones-de-uso">Condiciones de uso</a></li>
                <li><a href="/politica-de-proteccion-de-datos">Política de protección de datos</a></li>
                <li><a href="/aviso-legal">Aviso legal</a></li>
                <li><a href="/politica-de-cookies">Política de cookies</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-footer hidden-sm hidden-xs">
                <li> &copy; RIMT by yfcode-shops v1.0</li>
            </ul>
            <ul class="nav navbar-nav navbar-footer hidden-md hidden-lg">
                <li> &copy; RIMT by yfcode-shops v1.0</li>
            </ul>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
  ================================================== -->



<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
{!! HTML::script('js/jquery.confirm.min.js') !!}




@yield('scripts')
</body>
</html>