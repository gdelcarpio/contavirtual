@extends('app')

@section('content')

{{-- <link href="plugins/select2/select2.css" rel="stylesheet"> --}}

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">GASTOS</a></li>
			<li><a href="index.html">Crear</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">

			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-text-o"></i>
					<span>NUEVO USUARIO</span>
				</div>			
			</div>

			<div class="box-content">

				@include('errors.form')

				{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}
					
					@include('users.partials.form', ['submitButton' => 'INGRESAR USUARIO'])

				{!! Form::close() !!}

			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

	@include('scripts.ajax-provinces-districts')

@endsection
