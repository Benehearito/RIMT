@foreach($albums as $album)
    <li data-id="{{ $album['data']->id }}">
        <i class="icon-move"><span class="glyphicon glyphicon-move" aria-hidden="true"></span></i>
        {{$album['data']->title_es}}

        <span class="pull-right">
            <a class="btn btn-info" href="{{route('admin.albums.edit',$album['data']->id) }}" role="button">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>


            <a class="btn btn-danger btndelete" href="#">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
        </span>

        <ol>
        @if (!empty($album['children']))
                @include('admin.albums.partials.table', ['albums' => $album['children']])
        @endif
        </ol>
    </li>
@endforeach

