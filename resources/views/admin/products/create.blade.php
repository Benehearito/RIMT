@extends('layouts.app')

@section('contentheader_title')
	Productos
@endsection

@section('contentheader_description')
	Nuevo producto
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="box">
				{!! Form::open(['route' => 'admin.products.store','class'=>'form-horizontal', 'role'=>'form' , 'method' => 'POST']) !!}
				<div class="box-header with-border">
					<h3 class="box-title">Nuevo producto</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					@include('admin.products.partials.errors')
					@include('admin.products.partials.fields')
				</div>
				<div class="box-footer">
					<p class="text-center"><button type="submit" class="btn btn-info">Crear producto</button></p>
				</div>
				{!! csrf_field() !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

@section('style')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endsection

@section('scripts')
	@include('layouts.partials.scripts')
	<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection