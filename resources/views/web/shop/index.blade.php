@extends('weblayout')
@section('content_primary')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                @foreach($cjtshop as $item)
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default panel-home  sombra efecto-trans">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <h1 class="panel-title">{{$item['data']['title_es'] }}</h1>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        {{$item['data']['text_es'] }}

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            @foreach($item['children'] as $child)
                                                <div class="panel panel-info sombra-light">
                                                    <div class="panel-heading" role="tab" id="heading{{$child['data']['id'] }}">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$child['data']['id'] }}" aria-expanded="false" aria-controls="collapse{{$child['data']['id'] }}">
                                                                {{$child['data']['title_es'] }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse{{$child['data']['id'] }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$child['data']['id'] }}">
                                                        <div class="panel-body">
                                                            <div class="col-lg-12 col-md-12"><p>{{$child['data']['text_es'] }}</p></div>
                                                            @foreach($child['products'] as $product)
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="thumbnail">
                                                                        <img src="..." alt="...">
                                                                        <div class="caption">
                                                                            <h3>{{ $product['title_es'] }}</h3>
                                                                            <p>...</p>
                                                                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('web.partials.gallerypopup')
@endsection