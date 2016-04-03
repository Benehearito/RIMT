@extends('weblayout')

@section('content_primary')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="panel panel-default panel-home panel-home-bg sombra efecto-trans">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4  col-md-3 imagen-fondo-logo-home image-home">{{ Html::image('theme/logo.png', 'RIMT LOGO', ['class'=>'img-circle sombra']) }}</div>
                                <div class="col-lg-8 col-md-9">
                                    <h1 class="panel-title">Reformas Integrales Microcemento Tenerife</h1>
                                    <br>
                                    <p>Reformas Integrales Microcemento Tenerife﻿ es una empresa dedicada a la construcción de obras y reformas de todo tipo en Canarias.</p><br>
                                    <p>Nuestro trabajo va desde construcción de obras completas, a reformas de viviendas, locales y oficinas.</p><br>
                                    <p>Una característica muy importante de nuestro trabajo es la utilización de materiales de calidad e innovadores y
                                        nos encargamos de la distribución y aplicación de productos para la construcción de la empresa Pinturas Roda
                                        Fuerte, S.L. en Canarias como Microcemento,Recina Poxi y muchos mas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default panel-info panel-myinfo panel-rimt sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Servicios</h2>
                            <p>Reformas Integrales Microcemento Tenerife﻿ cuenta con los profesionales más cualificados para encargarse de todos los procesos de la obra</p>
                            <div class="bottomaligned"><a class ="btn btn-warning" href="/servicios" role="button">Servicios &raquo;</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default panel-info panel-myinfo panel-shop sombra efecto-trans">
                        <div class="panel-body">
                            <h2>SHOP</h2>
                            <p>En nuestra tienda podra encontrar muchos de los materiales de calidad que se utilizamos en nuestras obras</p>
                            <div class="bottomaligned"><a class ="btn btn-success" href="/shop" role="button">SHOP &raquo;</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default  panel-info panel-myinfo panel-video sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Proyectos</h2>
                            <p>Aquí encontraras proyectos en proceso de realización y terminados referentes a nuestro trabajo</p>
                            <div class="bottomaligned"><a class ="btn btn-danger" href="/proyectos" role="button">Proyectos &raquo;</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default  panel-info panel-myinfo panel-help sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Videos</h2>
                            <p>En nuestra seccion de videos podrar encontrar pruebas de los productos que usamos, y de su modo de aplicación</p>
                            <div class="bottomaligned"><a class ="btn btn-primary" href="/videos" role="button">Videos &raquo;</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default  panel-info panel-myinfo panel-contact sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Contacto</h2>
                            <p>Horario de atención al Cliente:<br>Lunes a Viernes de 9 a 14h<br>Teléfono: 646 541 774<br></p>
                            <div class="bottomaligned"><a class ="btn btn-info" href="/contacto" role="button">Contactar &raquo;</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
