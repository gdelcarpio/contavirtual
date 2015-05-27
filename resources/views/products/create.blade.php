@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Productos - Servicios</a></li>
			<li>Crear</li>
		</ol>
	</div>
</div> 


<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">

			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-text-o"></i>
					<span>NUEVO PRODUCTO</span>
				</div>			
			</div>


			<div class="box-content">
				@include('errors.form')
				{!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}
					<h3>Datos del Producto/Servicio</h3>	
					<div class="row">
						<div class="col-sm-6">					
							@include('products.partials.form')
							<!-- boton -->
							<div class="col-sm-8 col-sm-offset-4 text-left">
								<div class="form-group">						
									{!! Form::submit('Crear Producto', ['class' => 'btn btn-primary']) !!}						
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


