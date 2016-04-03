@extends('layouts.app')

@section('contentheader_title')
	Pedidos
@endsection

@section('contentheader_description')
	Detalle del pedido
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Detalle del pedido </h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@include('admin.orders.partials.errors')
					{!! Form::model($order,['route' => ['admin.orders.update', $order->id],'class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
					<div class="row">
						<div class="col-md-5">@include('admin.orders.partials.staticfields')</div>
						<div class="col-md-7">@include('admin.orders.partials.fields')</div>
					</div>
					{!! Form::close() !!}
				</div>
				<div class="box-footer">
					<p class="text-center"><button type="submit" class="btn btn-info">Actualizar pedido</button></p>
				</div>
			</div>
			<div class="box">
				@include('admin.orders.partials.products')
			</div>
		</div>
	</div>


{{ Form::open(['route' => 'admin.orders.activate' , 'method' => 'post',  'id'=>'form-ajax-activate' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_activate']) !!}
{!! csrf_field() !!}
{{ Form::close() }}


{{ Form::open(['route' => 'admin.orders.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_delete']) !!}
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

	<script>
		$(document).ready(function (){


			$('.btndelete').click (function (e){
				e.preventDefault();
				var row = $(this).parents('li');
				var id = row.data('id');
				var form =$('#form-ajax-delete');
				var url =  form.attr('action');
				$('#id_delete').val(id);
				data = form.serialize();
				$( ".alert" ).fadeOut();
				$.confirm({
					title:"Confirmar cancelar pedido",
					text: "Esta seguro de cancelar el pedido",
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
					confirmButton: "Si, cancela",
					cancelButton: "No"
				});


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
