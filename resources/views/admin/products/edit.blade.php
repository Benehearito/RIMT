@extends('layouts.app')

@section('contentheader_title')
	Productos
@endsection

@section('contentheader_description')
	Editar producto <b>{{ $product->title_es }}</b>
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				{!! Form::model($product,['route' => ['admin.products.update', $product->id],'class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
				<div class="box-header with-border">
					<h3 class="box-title">Editar producto <b>{{ $product->title_es }}</b></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-box-tool dropdown-toggle" type="button" aria-expanded="false">
								<i class="fa fa-wrench"></i></button>
							<ul role="menu" class="dropdown-menu">
								<li><a href="#" class="btn-delete">Eliminar producto</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@include('admin.products.partials.errors')
					@include('admin.products.partials.fields')
				</div>
				<div class="box-footer">
					<p class="text-center"><button type="submit" class="btn btn-info">Actualizar producto</button></p>
				</div>
				{!! csrf_field() !!}
				{!! Form::close() !!}
			</div>
			<div class="box">
				<div id="cjto_images"></div>
			</div>
			<div class="box">
				@if ($product->category_id>0)
					@include('admin.products.partials.order')
				@endif
			</div>
		</div>
	</div>


@include('admin.partials.modal_images')

@include('admin.products.partials.delete')


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

{{ Form::open(['route' => 'admin.imagesproducts.cjt_images_saveorder' , 'method' => 'post',  'id'=>'form-ajax-saveorder-images' ]) }}
{!! Form::hidden ('product_id',$product->id ) !!}
{!! Form::hidden ('save_order_images', 0, ['id'=>'save_order_images']) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.imagesproducts.cjt_images_delete' , 'method' => 'delete',  'id'=>'form-ajax-delete-images' ]) }}
{!! Form::hidden ('pivot_id',0, ['id'=>'pivot_id'] ) !!}
{!! csrf_field() !!}
{{ Form::close() }}

{{ Form::open(['route' => 'admin.imagesproducts.addimages' , 'method' => 'post',  'id'=>'form-ajax-addimages' ]) }}
{!! Form::hidden ('product_id',$product->id ) !!}
{!! Form::hidden ('add_images', 0, ['id'=>'add_images']) !!}
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
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).ready(function (){

			var id_producto =  '{{$product->id}}';


			$('#addimagesModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('title') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('Añadir imagenes al producto ' + recipient);
				var id= $( "#album" ).val()
				chargeImagesAdd(id);

			});
			$( "#album" ).change(function() {
				var id= $( "#album" ).val()
				chargeImagesAdd(id);
			});

			function chargeImagesAdd (id){
				$.ajax({
					url: '{{  URL::route('admin.imagesproducts.addimagesproduct')  }}',
					type: "GET", // not POST, laravel won't allow it
					data: { id:id } ,
					success: function(data){
						$data = $(data); // the HTML content your controller has produced
						$('#addImages').html($data).fadeIn();
						initaddimages();
					}
				});
			}

			function initaddimages(){
				$( "#addImages #album" ).selectpicker();
				$('#saveimages').on('click',function(e)	{
					e.preventDefault();
					var cnt = $("#addImages input[name='chk_images']:checked").length;

					if (cnt > 0)
					{
						var id_images = [];
						$("#addImages input[name='chk_images']:checked").each(function() {
							id_images.push($(this).val());
						});

						$( ".alert" ).fadeOut();

						$('#add_images').val(id_images);
						var form =$('#form-ajax-addimages');
						var url =  form.attr('action');
						data = form.serialize();
						$.post (url , data , function (result) {
							if (result.success=='ok') {
								$('#addimagesModal').modal('toggle');
								chargeCtjoImages();
								//$( ".orderproducts" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
								//$("html, body").animate({ scrollTop: 0 }, "slow");
							}else{
								$( ".orderproducts" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
							}
						}).fail (function () {

						});

					}else{
						$('#addimagesModal').modal('toggle');
					}
				});

			}

			$("ol.products-shortable").sortable({
						group: 'no-drop',
						handle: 'i.icon-move'
					} );

			$('#btn_saveorder').click (function (e){
				e.preventDefault();
				$( ".alert" ).fadeOut();
				var data = $( ".products-shortable" ).sortable( "toArray", {attribute: "data-item"} );
				$('#save_order').val(data);
				var form =$('#form-ajax-saveorder');
				var url =  form.attr('action');
				data = form.serialize();
				$.post (url , data , function (result) {
					if (result.success=='ok') {
						$( ".alert" ).hide();
						$( ".orderproducts" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
						//$("html, body").animate({ scrollTop: 0 }, "slow");
					}else{
						$( ".orderproducts" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
					}
				}).fail (function () {

				});

			});

			$('.btnAct').click (function (e){
				e.preventDefault();
				var row = $(this).parents('li');
				var id = row.attr('data-item');
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
								$( ".orderproducts" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
							}else{
								$( ".orderproducts" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );

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
				var id = row.attr('data-item');
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
								$( ".orderproducts" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
							}else{
								$( ".orderproducts" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );

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
				var id = row.data('item');

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
									$( ".orderproducts" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
								}else{
									$( ".orderproducts" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
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

			function chargeCtjoImages(){
				$('#cjto_images').fadeOut( 500, function() {
					$.ajax({
						url: '{{  URL::route('admin.imagesproducts.cjt_images' , ['id' => $product->id])  }}',
						type: "GET", // not POST, laravel won't allow it
						success: function(data){
							$data = $(data); // the HTML content your controller has produced
							$('#cjto_images').html($data).fadeIn();
							iniciar_cjtoimages()
						}
					});
				});
			}
			function iniciar_cjtoimages(){
				$( "#cjto_images #sortable-products-images" ).sortable();
				$( "#cjto_images #sortable-products-images" ).disableSelection();

				$('#cjto_images').on('click', '.btndelete-cjtoimages', function(e){
					e.preventDefault();
					var pivot_id=$(this).parents('div').attr('data-item');
					var form =$('#form-ajax-delete-images');
					var url =  form.attr('action');
					$('#pivot_id').val(pivot_id);
					var data = form.serialize();
					$( ".alert" ).fadeOut();

					var row = $(this).parents('div .boximage');

					$.confirm({
						title:"Confirmar borrado",
						text: "Esta seguro de borrar la imagen del artículo",
						confirm: function() {
							$.post (url , data , function (result) {
								if (result.success=='ok') {
									row.fadeOut().remove();
									$( ".cjtoimages" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
								}else{
									$( ".cjtoimages" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
								}
							}).fail (function () {
								//row.show();
							});
						},
						cancel: function() {

						},
						confirmButton: "Si, elimína",
						cancelButton: "No"
					});
				});
				$('#cjto_images').on('click', '#btn_saveorder_images', function(e){

					e.preventDefault();
					$( ".alert" ).fadeOut();
					var data = $( "#cjto_images #sortable-products-images" ).sortable( "toArray", {attribute: "data-item"} );

					$('#save_order_images').val(data);
					var form =$('#form-ajax-saveorder-images');
					var url =  form.attr('action');
					data = form.serialize();
					$.post (url , data , function (result) {
						if (result.success=='ok') {
							$( ".alert" ).hide();
							$( ".cjtoimages" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
							//$("html, body").animate({ scrollTop: 0 }, "slow");
						}else{
							$( ".cjtoimages" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
						}
					}).fail (function () {

					});
				});

			}

			chargeCtjoImages();

		});

	</script>
@endsection
