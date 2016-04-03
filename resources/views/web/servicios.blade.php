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
                                    <h1 class="panel-title">Servicios</h1>
                                    <br>
                                    <p>
                                        Realización de planos<br>
                                        Valoraciones, tasaciones y peritaciones<br>
                                        Certificados e informes técnicos<br>
                                        Trámite de permisos y licencias<br>
                                        Aplicador de <strong>Microcemento</strong>, <em>titulación oficial</em><br>
                                        Albañilería<br>
                                        Fontanería<br>
                                        Pintura<br>
                                        Decoración<br>
                                        Carpintería, <em>Aluminio y Madera</em>﻿<br>
                                        Electricidad﻿<br>
                                        Placas solares<br>
                                        Ideas creativas para un mejor aprovechamiento del espacio<br>
                                        Control de calidad<br>
                                        <br>
                                        <i class="fa fa-exclamation-triangle"></i><i> Presupuesto sin compromiso</i><br>
                                    </p>
                                </div>
                            </div>
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
@section('content_secundary')

@endsection
