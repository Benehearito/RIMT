<div class="box-header with-border">
    <h3 class="box-title">Productos del pedido</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
    </div>
</div>
<div class="box-body">
    @include('admin.users.partials.errors')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Datos</th>
                <th class='text-center'>Cantidad</th>
                <th class='text-center'>Precio</th>
                <th class='text-center'>Total</th>
                <th class='text-right'>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr data-id="{{ $product->id }}">
                <th scope="row">{{$product->id}}</th>
                <td>
                    {{$product->title_es}}
                </td>
                <td class='text-center'>
                    {{$product->quantity}}
                </td>
                <td class='text-center'>
                    {{$product->price}} €
                </td>
                <th class='text-center'>
                    {{$product->price*$product->quantity}} €
                </th>
                <td class='text-right'>
                    <a class="btn btn-info" href="{{route('admin.products.edit', $product->id)}}" role="button">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @if ($product->active)
                        <a class="btn btn-warning btnbanAct" id="btnbanAct{{ $product->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnbanDes" id="btnbanDes{{ $product->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @else
                        <a class="btn btn-warning btnbanAct" id="btnbanAct{{ $product->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnbanDes" id="btnbanDes{{ $product->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @endif
                    <a class="btn btn-danger btndelete" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div class="box-footer">
</div>

