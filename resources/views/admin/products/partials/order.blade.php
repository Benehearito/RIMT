<div class="box-header with-border">
    <h3 class="box-title">Ordenar productos de la categoría <b>{{ $category_parent->title_es }}</b></h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
    </div>
</div>
<div class="box-body">
    <ol class='products-shortable'>
        @foreach($products as $product)
            <li data-item="{{ $product->id }}">
                <i class="icon-move"><span class="glyphicon glyphicon-move" aria-hidden="true"></span></i>
                {{$product->title_es}}

                <span class="pull-right">
                    <a class="btn btn-info" href="{{route('admin.products.edit',$product->id) }}" role="button">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @if ($product->active)
                        <a class="btn btn-warning btnAct" id="btnAct{{ $product->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnDes" id="btnDes{{ $product->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @else
                        <a class="btn btn-warning btnAct" id="btnAct{{ $product->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnDes" id="btnDes{{ $product->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @endif
                    <a class="btn btn-danger btndelete" href="#">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                </span>
            </li>
        @endforeach
    </ol>
</div>
