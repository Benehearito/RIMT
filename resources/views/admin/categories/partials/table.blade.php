@foreach($categories as $category)
    <li data-id="{{ $category['data']->id }}">
        <i class="icon-move"><span class="glyphicon glyphicon-move" aria-hidden="true"></span></i>
        {{$category['data']->title_es}}

        <span class="pull-right">
            <a class="btn btn-info" href="{{route('admin.categories.edit',$category['data']->id) }}" role="button">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
            @if ($category['data']->active)
                <a class="btn btn-warning btnAct" id="btnAct{{ $category['data']->id }}" style="display:none" href="#">
                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </a>
                <a class="btn btn-success btnDes" id="btnDes{{ $category['data']->id }}" href="#">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                </a>
            @else
                <a class="btn btn-warning btnAct" id="btnAct{{ $category['data']->id }}" href="#">
                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </a>
                <a class="btn btn-success btnDes" id="btnDes{{ $category['data']->id }}" style="display:none" href="#">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                </a>
            @endif

            <a class="btn btn-danger btndelete" href="#">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
        </span>

        <ol>
        @if (!empty($category['children']))
                @include('admin.categories.partials.table', ['categories' => $category['children']])
        @endif
        </ol>
    </li>
@endforeach

