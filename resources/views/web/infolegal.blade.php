@extends('weblayout')

@section('content_primary')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-home  panel-info panel-myinfo panel-help sombra efecto-trans">
                        <div class="panel-body">
                            @if (Request::segment(1)=='condiciones-de-uso')
                                @include('web.legal.condicionesuso')
                            @elseif (Request::segment(1)=='aviso-legal')
                                @include('web.legal.legal')
                            @elseif (Request::segment(1)=='politica-de-cookies')
                                @include('web.legal.cookies')
                            @elseif (Request::segment(1)=='politica-de-proteccion-de-datos')
                                @include('web.legal.protecciondatos')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

