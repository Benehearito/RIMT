{!! Form::open(['route' => 'admin.categories.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $category->id, ['id'=>'id_category']) !!}
    {!! csrf_field() !!}
{!! Form::close() !!}

