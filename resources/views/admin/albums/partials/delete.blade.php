{!! Form::open(['route' => 'admin.albums.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $album->id, ['id'=>'id_album']) !!}
    {!! csrf_field() !!}
{!! Form::close() !!}

