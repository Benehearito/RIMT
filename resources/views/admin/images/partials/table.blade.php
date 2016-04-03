@if (count($images) > 0)
    @for ($i = 0; $i < count($images); $i++)
        @if ($i==0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if ($images[$i]['album_id']==0)
                        Sin Album
                    @else
                        {{$images[$i]['parent']['title_es']}}
                    @endif
                </div>
                <div class="panel-body">
                    <div class="row">
        @elseif ($images[$i]['parent']!=$images[$i-1]['parent'])
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$images[$i]['parent']['title_es']}}
                </div>
                <div class="panel-body">
                    <div class="row">
        @endif

                        <div class="col-sm-6 col-md-4" id="imagen_{{ $images[$i]['id'] }}">
                            <div class="thumbnail">
                                {{ Html::image('uploads/images/p_'.$images[$i]['imagen'], $images[$i]['imagen']) }}
                                <div class="caption" data-id="{{ $images[$i]['id'] }}">
                                    <p class="text-center" >
                                        <a class="btn btn-info" href="{{route('admin.images.edit', $images[$i]['id'])}}" role="button">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a class="btn btn-danger btndelete" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
    @endfor
                </div>
            </div>
        </div>
@endif
