{!! Form::open(['route' => 'admin.products.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $product->id, ['id'=>'id_product']) !!}
    {!! csrf_field() !!}
{!! Form::close() !!}

