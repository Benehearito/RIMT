<div class="box-header with-border">
    <h3 class="box-title">Editar orden de imagenes del album <b>{{ $album->title_es }}</b></h3>
    <div class="box-tools pull-right">
        <a class="btn btn-sm btn-success btn-social " href="{{route('admin.images.create',$album->id) }}">
            <i class="fa fa-cloud-upload"></i>
            Nuevas imagenes
        </a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
    </div>
</div>
<div class="box-body">
    <div class="container-fluid">
        <div class="row" id="sortable">
            @foreach($images as $image)
                <div class="col-sm-3 col-md-2"  data-item="{{ $image->id }}">
                    <div class="thumbnail" >
                        {{ Html::image('uploads/images/p_'.$image->imagen, $image->imagen) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="box-footer">
    <p class="text-center"><a role="button" id="btn_saveorder" href="#" class="btn btn-info">Guardar ordén</a></p>
</div>
