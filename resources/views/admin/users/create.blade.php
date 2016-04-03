@extends('layouts.app')

@section('contentheader_title')
	Usarios
@endsection

@section('contentheader_description')
	Nuevo usuario
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-6 col-lg-offset-3">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Nuevo usuario</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">

					@include('admin.users.partials.errors')

					{!! Form::open(['route' => 'admin.users.store','class'=>'form-horizontal', 'role'=>'form' , 'method' => 'POST']) !!}
					@include('admin.users.partials.fields')
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">@lang('validation.attributes.password')</label>

						<div class="col-md-8">
							<input type="password" class="form-control" name="password" placeholder="Por favor introduzca un password">

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
							<input type="password" class="form-control" name="password_confirmation" placeholder="Por favor repita el password">

							@if ($errors->has('password_confirmation'))
								<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
							@endif
						</div>
					</div>
					<p class="text-center"><button type="submit" class="btn btn-info">Crear usuario</button></p>
					{!! Form::close() !!}


				</div>
				<div class="box-footer">

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
@endsection