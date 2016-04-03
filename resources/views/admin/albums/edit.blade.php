@extends('layouts.app')

@section('contentheader_title')
	Albums
@endsection

@section('contentheader_description')
	Editar album <b>{{ $album->title_es }}</b>
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				{!! Form::model($album,['route' => ['admin.albums.update', $album->id],'class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
				<div class="box-header with-border">
					<h3 class="box-title">Editar album <b>{{ $album->title_es }}</b></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-box-tool dropdown-toggle" type="button" aria-expanded="false">
								<i class="fa fa-wrench"></i></button>
							<ul role="menu" class="dropdown-menu">
								<li><a href="#" class="btn-delete">Eliminar album</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@include('admin.albums.partials.errors')
					@include('admin.albums.partials.fields')
				</div>
				<div class="box-footer">
					<p class="text-center"><button type="submit" class="btn btn-info">Actualizar Album</button></p>
				</div>
			</div>
			<div class="box">
				@include('admin.albums.partials.images')
			</div>
			{!! csrf_field() !!}
			{!! Form::close() !!}
		</div>
	</div>

@include('admin.albums.partials.delete')

{{ Form::open(['route' => 'admin.images.saveorder' , 'method' => 'post',  'id'=>'form-ajax-saveorder' ]) }}
{!! Form::hidden ('save_order', 0, ['id'=>'save_order']) !!}
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
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).ready(function (){
			$( "#sortable" ).sortable();
			$( "#sortable" ).disableSelection();
			$('.btn-delete').click (function (e){
				$.confirm({
					title:"Confirmar borrado",
					text: "Esta seguro de borrar el album",
					confirm: function() {
						$('#form-delete').submit();
					},
					cancel: function() {

					},
					confirmButton: "Si, elimína",
					cancelButton: "No"
				});
			});
			$('#btn_saveorder').click (function (e){
				e.preventDefault();
				$( ".alert" ).fadeOut();
				var data = $( "#sortable" ).sortable( "toArray", {attribute: "data-item"} );
				var jsonString = JSON.stringify(data, null, ' ');
				$('#save_order').val(jsonString);
				var form =$('#form-ajax-saveorder');
				var url =  form.attr('action');
				data = form.serialize();
				$.post (url , data , function (result) {
					if (result.success=='ok') {
						$( ".panel-heading-images" ).after( '<div class="alert alert-success" role="alert">'+result.menssage+'</div>' );
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}else{
						$( ".panel-heading-images" ).after( '<div class="alert alert-danger" role="alert">'+result.menssage+'</div>' );
					}
				}).fail (function () {

				});
			});

		});

	</script>
@endsection
