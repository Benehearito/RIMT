@extends('layouts.app')

@section('contentheader_title')
	Imagenes
@endsection

@section('contentheader_description')
	Listado imagenes
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Listado imagenes</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@if (Session::has('message'))
						<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif
					<span class="pull-right">
					{!! Form::select(
                                'album',
                                [''=>'Todas la imagenes']+ ['0'=>'Sin album']+$albums,
                                '',
                                array('class' => 'selectpicker',  'data-width'=>'180px','id' => 'album')
                    ) !!}
					</span>
					<p><a class="btn btn-info" href="{{ route('admin.images.create') }}" role="button">Nuevas imagenes</a></p>

				</div>
				<div class="box-footer">
					<div id="container">

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('style')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endsection

@section('scripts')
	@include('layouts.partials.scripts')
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
	<script>
		function chargeAlbumimages(){
			$('#container').fadeOut( 500, function() {
				$.ajax({
					url: '{{  URL::route('admin.images.albumimages')  }}',
					type: "GET", // not POST, laravel won't allow it
					data:{album_id:$( "#album" ).val()},
					success: function(data){
						$data = $(data); // the HTML content your controller has produced
						$('#container').html($data).fadeIn();
					}
				});
			});
		}
		$(document).ready(function (){
			$('.selectpicker').selectpicker();
			$('#container').hide();
			chargeAlbumimages();
			$( "#album" ).change(function() {
				chargeAlbumimages()
			});
		});
	</script>
@endsection