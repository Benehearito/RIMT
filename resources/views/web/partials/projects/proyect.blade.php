<div id="{{ $name }}">
    @if(count($gallery['images'])>0)
        <div class="web-conten-images col-lg-12">
        @foreach($gallery['images'] as $image)
            <div class="col-lg-1 conten-images">
                <a href="uploads/images/g_{{$image['imagen']}}" title="{{ $title }}" data-gallery  >
                    {{ Html::image('uploads/images/c_'.$image['imagen'], $image['imagen'],['class'=>'img-responsive']) }}
                </a>
            </div>
        @endforeach
        </div>
    @endif
</div>
