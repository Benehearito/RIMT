@extends('layouts.app')

@section('contentheader_title')
	Productos
@endsection

@section('contentheader_description')
	Listado de productos
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Listado de productos</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@if (Session::has('message'))
						<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif
						{!! Form::open(['route' =>'admin.products.index' , 'method'=>'GET', 'id' => 'form-search','class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}

						<div class="form-group">
							{!! Form::text('name', $find_name,['class'=>'form-control','placeholder' =>'Nombre del producto']) !!}
						</div>


						{!! Form::select(
                                    'category',
                                    [''=>'Todos los productos']+ [0=>'Sin categoria']+$categories,
                                    $find_category,
                                    array('class' => 'selectpicker',  'data-width'=>'180px','id' => 'role')
                        ) !!}

						<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}

						<p><a class="btn btn-info" href="{{ route('admin.products.create') }}" role="button">Crear Producto</a></p>

						<p>Hay {{ $products->lastPage() }} páginas</p>

						@include('admin.products.partials.table')

				</div>
				<div class="box-footer">
					{!! $products->appends(['name' => $find_name,'role'=>$find_category])->render() !!}
				</div>
			</div>
		</div>
	</div>

{{ Form::open(['route' => 'admin.products.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_product_delete']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.products.activate' , 'method' => 'post',  'id'=>'form-ajax-ban' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_product_active']) !!}
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
	<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
	<script>

		$(document).ready(function (){
			$('.selectpicker').selectpicker();
			$('.btndelete').click (function (e){
				e.preventDefault();
				var row = $(this).parents('tr');
				var id = row.data('id');
				var form =$('#form-ajax-delete');
				var url =  form.attr('action');
				$('#id_product_delete').val(id);
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
			});

			$('.btnbanAct').click (function (e){
				e.preventDefault();
				var row = $(this).parents('tr');
				var id = row.data('id');
				var btnAct = $('#btnbanAct'+id);
				var btnDes = $('#btnbanDes'+id);
				var form =$('#form-ajax-ban');
				var url =  form.attr('action');
				$('#id_product_active').val(id);
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

			$('.btnbanDes').click (function (e){
				e.preventDefault();
				var row = $(this).parents('tr');
				var id = row.data('id');
				var btnAct = $('#btnbanAct'+id);
				var btnDes = $('#btnbanDes'+id);
				var form =$('#form-ajax-ban');
				var url =  form.attr('action');
				$('#id_product_active').val(id);
				data = form.serialize();
				$( ".alert" ).fadeOut();
				$.confirm({
					title:"Confirmar desactivar",
					text: "Esta seguro de desactivar el producto",
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