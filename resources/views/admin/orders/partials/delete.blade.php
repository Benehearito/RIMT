{!! Form::open(['route' => 'admin.orders.delete' , 'method' => 'delete',  'id' => 'form-delete']) !!}
    {!! Form::hidden ('id', $order->id, ['id'=>'id_order']) !!}
    {!! csrf_field() !!}
    <p><button type="button"  class="btn btn-danger btn-delete">Cancelar pedido</button></p>
{!! Form::close() !!}

