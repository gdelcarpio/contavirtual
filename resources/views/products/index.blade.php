@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Lista de Productos / Servicios</a>
			</li>			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">		
		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('products.export.excel') }}" class="btn btn-success"><i class="fa fa-upload"></i> Exportar productos</a>
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
		</div>
		<div class="row">
			<hr class="dividor">

			<div class="col-md-6">

				@include('partials.search-form')
				|
				@include('partials.rows-form')

			</div>

			<div class="col-md-6 text-right">

			</div>

		</div>


		<div class="box">		
			<div class="box-content no-padding">
				<table class="table table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>							
							<th>
								<i class="fa fa-{{ show_sort_icon('code', $column, $direction) }}"></i>
          						{!! sort_model_by('code', 'Código', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
          						{!! sort_model_by('name', 'Nombre', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('description', $column, $direction) }}"></i>
          						{!! sort_model_by('description', 'Descripción', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('price', $column, $direction) }}"></i>
          						{!! sort_model_by('price', 'Precio uni. (sin IGV)', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('active', $column, $direction) }}"></i>
          						{!! sort_model_by('active', 'Activo', url_alias()) !!}
							</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr @if($product->active == 0) class="alert-danger" @endif data-id="{{ $product->id }}" data-type="el producto: " data-name="{{ $product->name }}">							
							<td>{{ $product->code }}</td>
							<td>{{ $product->name }}</td>
							<td>{{ str_limit($product->description, 40, '...') }}</td>
							<td>PEN {{ $product->price }}</td>
							<td>{{ $product->active == 1 ? 'Sí' : 'No' }}</td>
							<td>
								<a href="{{ route('products.edit', $product) }}">Editar</a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" class="option-icons row-delete"><i class="fa fa-trash-o fa-lg"></i></a>
							</td>
						</tr>
						@endforeach					
					</tbody>
				</table>
			</div>
		</div>

		<!-- paginado inferior -->

	</div>
    <div class="col-md-6">
    	{!! $products->setPath('')->appends(['rows' => Input::get('rows')])->render() !!}
	</div>
	<div class="col-md-6 text-right">
		<div>Mostrando de {!! $products->firstItem()!!} a {!! $products->lastItem() !!}  de  un total de {!! $products->total() !!}  resultados</div>
	</div>
</div>

<!-- DELETE FORM -->

{!! Form::open([ 'route' => ['products.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

{!! Form::close() !!}

<!-- RESET FORM -->

@endsection

@section('ajax-scripts')

  @include('scripts.ajax-delete')

@endsection