
    <div class="box-header with-border">
        <h3 class="box-title">Imagenes del producto <b>{{ $product->title_es }}</b></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-sm btn-success btn-social" data-toggle="modal" data-target="#addimagesModal" data-title="{{ $product->title_es }}">
                <i class="fa fa-camera"></i>Añadir imagenes
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>
    </div>
    <div class="box-body">
        <div class="row" id="sortable-products-images">
            @foreach($product->images as $image)
                <div class="col-sm-6 col-md-3 boximage" id="imagen_{{ $image->pivot->id  }}"  data-item="{{ $image->pivot->id  }}">
                    <div class="thumbnail" >
                        {{ Html::image('uploads/images/p_'.$image->imagen, $image->imagen) }}
                        <div class="caption" data-item="{{ $image->pivot->id   }}">
                            <p class="text-center" >
                                <a class="btn btn-danger btndelete-cjtoimages" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="box-footer">
        <p class="text-center">
            @if (count($product->images)>0)
                <a role="button" id="btn_saveorder_images" href="#" class="btn btn-info">Guardar ordén</a>
            @endif
        </p>
    </div>
