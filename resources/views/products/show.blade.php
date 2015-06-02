@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Lista de productos / servicios</a>
			</li>			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">		
		<!-- <div class="row">
			<div class="col-md-6">
				<a href="#" class="btn btn-success"><i class="fa fa-upload"></i> Exportar productos</a>
				<a href="#" class="btn btn-success"><i class="fa fa-download"></i> Importar productos</a>
				<a href="#">Descargar archivo de muestra</a>
			</div>
			<div class="col-md-6 text-right">					
				<div class="btn-group">
					<a href="{{ route('products.create') }}"  class="btn btn-danger crear_documento">
						<i class="fa fa-plus"></i> Registrar Producto / Servicio
					</a>			 
				</div>
			</div>
		</div> -->


		</div>
<div class="col-xs-8">

		<div class="box">	
			<div class="box-header">
				<div class="box-name">{{ $product->code }}</div>
			</div>	
			<div class="box-content">
				

					<div class="row">
							<div class="col-sm-6">						
								
						


						<!-- NOMBRE -->

							<div>
								
								<div class="col-sm-4">Nombre:</div>
								<div class="col-sm-8">{{ $product->name }}	</div>	
												
							</div>

						<!-- DESCRIPCION -->

							<div>
								
								<div class="col-sm-4">Descripción:</div>
								<div class="col-sm-8">			
									{{ $product->description }}
								</div>	
												
							</div>

							<!-- PRECIO -->

							<div>
								
								{!! Form::label('price', 'Precio unit. (sin IGV):', ['class' => 'col-sm-4 label-control']) !!}		
								<div class="col-sm-5">			
								{{ $product->price }}
								</div>	
								
												
							</div>


						<!-- ACTIVO  -->
							<div class="form-group">
								
								{!! Form::label('active', 'Activo', ['class' => 'col-sm-4 label-control']) !!}		
								<div class="col-sm-5">	
								@if($product->active == 1)
									Está activo
								@else
									No está activo
								@endif
								</div>	
												
							</div>
						</div>
					</div>	
				
			</div>
		</div>
</div>
		<!-- paginado inferior -->

	</div>
  
</div>


@endsection

@section('ajax-scripts')

@endsection