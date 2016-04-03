@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar cuenta {{ $user->nombre }}</div>
                @include('acount.partials.errors')
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							@include('acount.partials.data')
						</div>
						<div class="col-md-6">
							@include('acount.partials.password')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



