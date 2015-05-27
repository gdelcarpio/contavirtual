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
					<span>Editar Producto</span>
				</div>			
			</div>

			<div class="box-content">
				{!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT']) !!}

					<h3>Datos del Producto/Servicio</h3>	

					<div class="row">
						<div class="col-sm-6">						
							@include('products.partials.form')
							<!-- boton -->
							<div class="col-sm-8 col-sm-offset-4 text-left">
								<div class="form-group">						
									{!! Form::submit('Editar Producto', ['class' => 'btn btn-primary']) !!}						
								</div>
							</div>
						</div>
					</div>	
				{!! Form::close() !!}
			</div><!-- box-content -->

		</div><!-- box -->

	</div>
</div> <!-- row -->

@endsection


