{!! Form::open(['route' => 'admin.products.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $product->id, ['id'=>'id_product']) !!}
    {!! csrf_field() !!}
    <p><button type="button"  class="btn btn-danger btn-delete">Eliminar producto</button></p>
{!! Form::close() !!}

