@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo producto</div>

				<div class="panel-body">
                    @include('admin.products.partials.errors')

                    {!! Form::open(['route' => 'admin.products.store','class'=>'form-horizontal', 'role'=>'form' , 'method' => 'POST']) !!}
                        @include('admin.products.partials.fields')

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                       			 <button type="submit" class="btn btn-default">Guardar</button>
							</div>
						</div>
                    {!! Form::close() !!}
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
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection