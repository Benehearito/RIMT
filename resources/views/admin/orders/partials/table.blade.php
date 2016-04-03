<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Datos del comprador</th>
            <th>Costes</th>
            <th class='text-center'>Estado</th>
            <th class='text-right'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr data-id="{{ $order->id }}">
                <th scope="row">000000{{$order->id}}</th>
                <td style="width: 50%">
                    Nombre: <b>{{$order->name}}</b></br>
                    Mail: <b>{{$order->email}}</b></br>
                    Telefono: <b>{{$order->telephone}}</b>
                </td>
                <td class='text-left'>
                    Productos:  <b>{{$order->total}} €</b></br>
                    Envio:  <b>{{$order->total_shipping}} €</b></br>
                    Total:  <b>{{$order->total+$order->total_shipping }} €</b>
                </td>
                <td class='text-center'>
                    {{$order->status}}

                </td>
                <td class='text-right'>
                    <a class="btn btn-info" href="{{route('admin.orders.edit', $order->id)}}" role="button">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>