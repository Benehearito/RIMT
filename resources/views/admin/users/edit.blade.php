@extends('layouts.app')

@section('contentheader_title')
	Usarios
@endsection

@section('contentheader_description')
	Editar usuario
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-6 col-lg-offset-3">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Editar usuario <b>{{ $user->nombre }}</b></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-box-tool dropdown-toggle" type="button" aria-expanded="false">
								<i class="fa fa-wrench"></i></button>
							<ul role="menu" class="dropdown-menu">
								<li><a href="#" class="btn-delete">Eliminar usuario</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@include('admin.users.partials.errors')
					{!! Form::model($user,['route' => ['admin.users.update', $user->id],'class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
					@include('admin.users.partials.fields')

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">@lang('validation.attributes.password_new')</label>

						<div class="col-md-8">
							{!! Form::password('password',['class'=>'form-control']) !!}

							@if ($errors->has('password'))
								<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">@lang('validation.attributes.confirm_password')</label>

						<div class="col-md-8">
							{!! Form::password('password_confirmation',['class'=>'form-control']) !!}

							@if ($errors->has('password_confirmation'))
								<span class="help-block">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
							@endif
						</div>
					</div>


					{!! Form::close() !!}
				</div>

				<div class="box-footer">
					<p class="text-center"><button type="submit" class="btn btn-info">Actualizar usuario</button></p>
				</div>
			</div>
		</div>
	</div>
	@include('admin.users.partials.delete')

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

			$('.btn-delete').click (function (e){
				$.confirm({
					title:"Confirmar borrado",
					text: "Esta seguro de borrar el ususario",
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
