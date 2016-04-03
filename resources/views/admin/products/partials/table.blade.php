<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Datos</th>
            <th class='text-center'>Categoria</th>
            <th class='text-center'>Estado</th>
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
                <th class='text-center'>
                    @if ($product->category_id==null)
                        Sin asignar
                    @else
                        {{$product->parent['title_es']}}
                    @endif
                </th>
                <td class='text-center'>
                    @if ($product->active!=null)
                        Activo
                    @else
                        Sin activar
                    @endif

                </td>
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