{!! Form::open(['route' => 'admin.users.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $user->id, ['id'=>'id_user']) !!}
    {!! csrf_field() !!}
{!! Form::close() !!}

