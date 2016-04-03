@extends('layouts.app')

@section('contentheader_title')
    Categorías
@endsection

@section('contentheader_description')
    Listado de categorías
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 col-lg-10 col-lg-offset-1">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de categorías</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    <p><a class="btn btn-info" href="{{ route('admin.categories.create') }}" role="button">Crear Categoría</a></p>
                    <ol class='categories-shortable'>
                        @include('admin.categories.partials.table', ['categories' => $categories, 'separador'=> ''])
                    </ol>


                </div>
                <div class="box-footer">
                    <p class="text-center"><a class="btn btn-info" href="#" id="btn_saveorder" role="button">Guardar ordén</a></p>
                </div>
            </div>
        </div>
    </div>

{{ Form::open(['route' => 'admin.categories.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
    {!! Form::hidden ('id', 0, ['id'=>'id_delete']) !!}
    {!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.categories.saveorder' , 'method' => 'post',  'id'=>'form-ajax-saveorder' ]) }}
{!! Form::hidden ('save_order', 0, ['id'=>'save_order']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.categories.activate' , 'method' => 'post',  'id'=>'form-ajax-activate' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_activate']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endsection

@section('scripts')
    @include('layouts.partials.scripts')
    <script src="{{ asset('js/jquery.confirm.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-sortable-min.js') }}"></script>
    <script>

        $(document).ready(function (){

            var group = $("ol.categories-shortable").sortable({
                        group: 'no-drop',
                        handle: 'i.icon-move'
                    }
            );

            $('#btn_saveorder').click (function (e){
                e.preventDefault();
                $( ".alert" ).fadeOut();
                var data = group.sortable("serialize").get();
                var jsonString = JSON.stringify(data, null, ' ');
                $('#save_order').val(jsonString);
                var form =$('#form-ajax-saveorder');
                var url =  form.attr('action');
                data = form.serialize();
                $.post (url , data , function (result) {
                    if (result.success=='ok') {
                        $( ".panel-heading" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }else{
                        $( ".panel-heading" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
                    }
                }).fail (function () {

                });

            });

            $('.selectpicker').selectpicker();

            $('.btndelete').click (function (e){
                e.preventDefault();
                var row = $(this).parents('li');
                var id = row.data('id');
                var form =$('#form-ajax-delete');
                $('#id_delete').val(id);
                $.confirm({
                    title:"Confirmar borrado",
                    text: "Esta seguro de borrar la categoría",
                    confirm: function() {
                        form.submit();
                    },
                    cancel: function() {
                        //alert("You cancelled.");
                    },
                    confirmButton: "Si, elimínalo",
                    cancelButton: "No"
                });
            });

            $('.btnAct').click (function (e){
                e.preventDefault();
                var row = $(this).parents('li');
                var id = row.data('id');
                var btnAct = $('#btnAct'+id);
                var btnDes = $('#btnDes'+id);
                var form =$('#form-ajax-activate');
                var url =  form.attr('action');
                $('#id_activate').val(id);
                data = form.serialize();
                $( ".alert" ).fadeOut();
                $.confirm({
                    title:"Confirmar activar",
                    text: "Esta seguro de activar la categoría",
                    confirm: function() {
                        $.post (url , data , function (result) {

                            if (result.success=='ok'){
                                btnAct.toggle();
                                btnDes.toggle();
                                $( ".panel-heading" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
                            }else{
                                $( ".panel-heading" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );

                            }

                        }).fail (function () {
                            //row.show();
                        });
                    },
                    cancel: function() {
                        //alert("You cancelled.");
                    },
                    confirmButton: "Si, activalo",
                    cancelButton: "No"
                });
            });

            $('.btnDes').click (function (e){
                e.preventDefault();
                var row = $(this).parents('li');
                var id = row.data('id');
                var btnAct = $('#btnAct'+id);
                var btnDes = $('#btnDes'+id);
                var form =$('#form-ajax-activate');
                var url =  form.attr('action');
                $('#id_activate').val(id);
                data = form.serialize();
                $( ".alert" ).fadeOut();
                $.confirm({
                    title:"Confirmar desactivar",
                    text: "Esta seguro de desactivar la categoría",
                    confirm: function() {
                        $.post (url , data , function (result) {

                            if (result.success=='ok'){
                                btnAct.toggle();
                                btnDes.toggle();
                                $( ".panel-heading" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
                            }else{
                                $( ".panel-heading" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );

                            }

                        }).fail (function () {
                            //row.show();
                        });
                    },
                    cancel: function() {
                        //alert("You cancelled.");
                    },
                    confirmButton: "Si, desactiva",
                    cancelButton: "No"
                });
            });
        });
    </script>
@endsection