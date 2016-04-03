@if (count($images) > 0)
    @for ($i = 0; $i < count($images); $i++)
        @if ($i==0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if ($images[$i]['album_id']==0)
                        Sin Album
                    @else
                        {{$images[$i]['parent']['title_es']}}
                    @endif
                </div>
                <div class="panel-body">
                    <div class="row">
                        @elseif ($images[$i]['parent']!=$images[$i-1]['parent'])
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$images[$i]['parent']['title_es']}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        @endif

                        <div class="col-sm-6 col-md-3" id="imagen_{{ $images[$i]['id'] }}">
                            <div class="thumbnail">
                                {{ Html::image('uploads/images/p_'.$images[$i]['imagen'], $images[$i]['imagen']) }}
                                <div class="caption" data-id="{{ $images[$i]['id'] }}">
                                    <p class="text-center" >
                                        <a class="btn btn-danger btndelete" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endfor

                    </div>
                </div>
            </div>
        @endif
        {{ Form::open(['route' => 'admin.images.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
        {!! Form::hidden ('id', 0, ['id'=>'id_image_delete']) !!}
        {!! csrf_field() !!}
        {{ Form::close() }}
        <script src="{{ asset('js/jquery.confirm.min.js') }}"></script>
        <script>
            $(document).ready(function () {

                $('.btndelete').click (function (e){
                    e.preventDefault();
                    var row = $(this).parents('div');
                    var id = row.data('id');
                    row = $('#imagen_'+id);
                    var form =$('#form-ajax-delete');
                    var url =  form.attr('action');
                    $('#id_image_delete').val(id);
                    data = form.serialize();
                    $( ".alert" ).fadeOut();
                    $.confirm({
                        title:"Confirmar borrado",
                        text: "Esta seguro de borrar la imagen",
                        confirm: function() {
                            $.post (url , data , function (result) {
                                if (result.success=='ok') {
                                    row.fadeOut().remove();;
                                    $( "#heading" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
                                }else{
                                    $( "#heading" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
                                }
                            }).fail (function () {
                                //row.show();
                            });
                        },
                        cancel: function() {
                            //alert("You cancelled.");
                        },
                        confirmButton: "Si, elimínalo",
                        cancelButton: "No"
                    });
                });
            });
        </script>

