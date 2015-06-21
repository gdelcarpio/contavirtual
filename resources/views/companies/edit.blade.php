@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Empresas</a></li>
			<li>Editar</li>
		</ol>
	</div>
</div> 


<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">

			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-text-o"></i>
					<span>EDITAR EMPRESA</span>
				</div>			
			</div>

			<div class="box-content">
				@include('errors.form')
				{!! Form::model($company, ['route'=>['companies.update', $company->id], 'method' => 'PUT']) !!}

					<h3>Datos de la empresa</h3>	
					<div class="row">
						<div class="col-sm-6">					
							
							@include('companies.partials.form')

							<!-- boton -->
							<div class="col-sm-8 col-sm-offset-4 text-left">
								<div class="form-group">
									{!! Form::submit('Editar Conpañia', ['class' => 'btn btn-primary']) !!}		
								</div>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>

		</div>
	</div>
</div>

@endsection


@section('scripts')
	<script src="{{ asset('js/util.js') }}"></script>
@endsection



