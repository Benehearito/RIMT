@extends('weblayout')

@section('content_primary')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default panel-home panel-home-bg sombra efecto-trans">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3  col-md-3 imagen-fondo-logo-home image-home">{{ Html::image('theme/logo.png', 'RIMT LOGO', ['class'=>'img-circle sombra']) }}</div>
                                <div class="col-lg-9 col-md-9">
                                    <h1 class="panel-title">Proyectos</h1>
                                    <br>
                                    <p>En esta sección, le presentamos algunos de los proyectos que hemos finalizado recientemente.<br>
                                        Reformas Integrales Microcemento Tenerife﻿﻿ le ofrece un servicio excepcional,
                                        un diseño esmerado y un asesoramiento personalizado, con una amplia variedad de productos y materiales con el fin de ayudarle a llevar a cabo sus proyectos.</p>
                                    <p>Le facilitaremos un presupuesto gratuito y sin compromiso. Póngase en contacto con nosotros.</p><br>
                                    @include('web.partials.projects')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('web.partials.gallerypopup')

@endsection

@section('style')
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-image-gallery.min.css') }}">
@endsection

@section('scripts')
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="{{ asset('js/bootstrap-image-gallery.min.js') }}"></script>
@endsection