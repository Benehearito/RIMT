@extends('layouts.app')

@section('contentheader_title')
	Pedidos
@endsection

@section('contentheader_description')
	Listado pedidos
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Listado pedidos</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@if (Session::has('message'))
						<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif


					<div class="panel-body">
						{!! Form::open(['route' =>'admin.orders.index' , 'method'=>'GET', 'id' => 'form-search','class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}

						<div class="form-group">
							{!! Form::text('name', $find_name,['class'=>'form-control','placeholder' =>'Nombre o Mail']) !!}
						</div>


						{!! Form::select(
                                    'status',
                                    [''=>'Pedidos en proceso']+ $status+['todos'=>'Todos los pedidos'],
                                    $find_status,
                                    array('class' => 'selectpicker',  'data-width'=>'180px','id' => 'role')
                        ) !!}

						<button type="submit" class="btn btn-default">Buscar</button>

						{!! Form::close() !!}


						<p>Hay {{ $orders->lastPage() }} páginas</p>

						@include('admin.orders.partials.table')


				</div>
				<div class="box-footer">
					{!! $orders->appends(['status'=>$find_status])->render() !!}
				</div>
			</div>
		</div>
	</div>


{{ Form::open(['route' => 'admin.orders.delete' , 'method' => 'delete',  'id'=>'form-ajax-delete' ]) }}
{!! Form::hidden ('id', 0, ['id'=>'id_order']) !!}
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