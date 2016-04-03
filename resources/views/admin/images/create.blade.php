@extends('layouts.app')

@section('contentheader_title')
	Imagenes
@endsection

@section('contentheader_description')
	Nuevas imagenes
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Nuevas imagenes</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'admin.images.store','class'=>'form-horizontal','id'=>'frm_upload', 'role'=>'form','files'=>true , 'method' => 'POST']) !!}
					<div class="form-group">
						<label class="col-md-1 control-label">@lang('validation.attributes.album')</label>
						<div class="col-md-5">
							{!! Form::select(
                                         'album_id',
                                         ['0'=>'Sin album']+$albums,
                                         $album_id,
                                         array('class' => 'selectpicker form-control', 'id' => 'album')
                            ) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-12">Seleccionar imagenes</label>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input id="images" name="images[]" type="file" multiple class="file file-loading" data-allowed-file-extensions='["png", "jpeg","jpg"]' aria-describedby="sizing-addon2">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="progress" id="myprogress">
								<div class="progress-bar progress-bar-danger progress-bar-striped" id="myprogressbar" role="progressbar" style="width: 0%;"></div>
							</div>
						</div>
					</div>
					{!! csrf_field() !!}
					{!! Form::close() !!}
					<div id="container">

					</div>
				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>

@endsection

@section('style')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
@endsection

@section('scripts')
	@include('layouts.partials.scripts')
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('vendors/fileinput/fileinput.min.js') }}"></script>
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

	$(document).ready(function () {
		$('#container').hide();
		chargeAlbumimages();
		$('#myprogress').hide(); //muestro mediante clase

		var form = document.getElementById('frm_upload');
		var request = new XMLHttpRequest();

		request.upload.addEventListener ('progress' ,function (e) {
			percent =(e.loaded/e.total*100)+'%';
			$('#myprogressbar').width(percent);
			$('#myprogress').fadeOut( "slow", function() {
				chargeAlbumimages();
			});
		}, false );
		request.upload.addEventListener ('load' ,function (e) {
			//console.log(JSON.parse(e.target.responseText));
		}, false );
		request.addEventListener('readystatechange', function(e) {
			if( this.readyState === 4 ) {
				$('#images').fileinput('reset');
				$('#myprogressbar').width('100%');
				//location.href = location.href;
			}
		});


		myfileinput =$("#images").fileinput({
			showUpload: true,
			maxFileCount: 10,
			mainClass: "input-group-lg",
			overwriteInitial: false,
			showRemove: false
		});

		document.getElementById('frm_upload').addEventListener('submit', function(e){
			//$('#btn_buscar').prop('disabled', true);
			e.preventDefault();
		//	$('#subir').prop('disabled', true);
			$('#myprogress').show(); //muestro mediante clase

			var formdata = new FormData(form);
			request.open ('post','{{  URL::route('admin.images.store')  }}');
			request.send(formdata);
		},false );

		$( "#album" ).change(function() {
			chargeAlbumimages()
		});


	});
	</script>
@endsection