@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar imagen </div>
                @include('admin.products.partials.errors')
				<div class="panel-body">
                    {!! Form::model($image,['route' => ['admin.products.update', $product->id],'class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
                        @include('admin.products.partials.fields')

						<p class="text-center"><button type="submit" class="btn btn-info">Actualizar producto</button></p>

                    {!! Form::close() !!}

				</div>
			</div>
			@include('admin.products.partials.delete')
			@if ($product->category_id>0)
				@include('admin.products.partials.order')
			@endif

		</div>
		<div class="col-md-10 col-md-offset-1">

		</div>
	</div>
</div>

{{ Form::open(['route' => 'admin.products.activate' , 'method' => 'post',  'id'=>'form-ajax-activate' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_activate']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.products.saveorder' , 'method' => 'post',  'id'=>'form-ajax-saveorder' ]) }}
{!! Form::hidden ('save_order', 0, ['id'=>'save_order']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.products.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_delete']) !!}
{!! csrf_field() !!}
{{ Form::close() }}


@endsection

@section('style')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endsection

@section('scripts')
	<script src="{{ asset('js/jquery.confirm.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('js/jquery-sortable-min.js') }}"></script>
	<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
	<script>
		$(document).ready(function (){

			var id_producto =  '{{$product->id}}';

			var group = $("ol.products-shortable").sortable({
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
					text: "Esta seguro de activar el producto",
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
					text: "Esta seguro de desactivar el product",
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

			$('.btndelete').click (function (e){
				e.preventDefault();
				var row = $(this).parents('li');
				var id = row.data('id');

				if (id==id_producto ){
					$.confirm({
						title:"Confirmar borrado",
						text: "Esta seguro de borrar el producto",
						confirm: function() {
							$('#form-delete').submit();
						},
						cancel: function() {

						},
						confirmButton: "Si, elimínalo",
						cancelButton: "No"
					});
				}else{
					var form =$('#form-ajax-delete');
					var url =  form.attr('action');
					$('#id_delete').val(id);
					data = form.serialize();
					$( ".alert" ).fadeOut();
					$.confirm({
						title:"Confirmar borrado",
						text: "Esta seguro de borrar el producto",
						confirm: function() {
							$.post (url , data , function (result) {
								if (result.success=='ok') {
									row.fadeOut().remove();
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
						confirmButton: "Si, elimínalo",
						cancelButton: "No"
					});
				}

			});

			$('.btn-delete').click (function (e){
				$.confirm({
					title:"Confirmar borrado",
					text: "Esta seguro de borrar el producto",
					confirm: function() {
						$('#form-delete').submit();
					},
					cancel: function() {

					},
					confirmButton: "Si, elimínalo",
					cancelButton: "No"
				});
			});

		});

	</script>
@endsection
