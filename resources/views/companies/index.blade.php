@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">LISTA DE EMPRESAS</a></li>
			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
			<ul class="nav nav-pills" role="tablist">
		  <li role="presentation" class="active"><a href="{{route('companies.index')}}">Todos <span class="badge">42</span></a></li>

		  
		  <li role="presentation">{!! filter_by(Route::currentRouteName(),"Clientes",1) !!}</li>
		  <li role="presentation"><a href="#">Clientes <span class="badge">30</span></a></li>
		  <li role="presentation"><a href="#">Proveedores <span class="badge">12</span></a></li>
		</ul>

		</div>
		<div class="col-md-6 text-right">
					
			<div class="btn-group">
			  <a href="paginas/empresa-crear.html"  class="btn btn-danger crear_documento">
			    <i class="fa fa-plus"></i> Registrar Empresa
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
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							
							<th>
								<i class="fa fa-{{ show_sort_icon('company_name', $column, $direction) }}"></i>
          						{!! sort_model_by('company_name', 'Empresa', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('ruc', $column, $direction) }}"></i>
          						{!! sort_model_by('ruc', 'RUC', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
          						{!! sort_model_by('name', 'Nombre de Contac.', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('email', $column, $direction) }}"></i>
          						{!! sort_model_by('email', 'Correo Electrónico', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('phone', $column, $direction) }}"></i>
          						{!! sort_model_by('phone', 'Teléfono', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('provider', $column, $direction) }}"></i>
          						{!! sort_model_by('provider', 'Proveedor', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('client', $column, $direction) }}"></i>
          						{!! sort_model_by('client', 'Cliente', Route::currentRouteName()) !!}
							</th>
							<th>Acciones</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($companies as $company)

						<tr>
							<td>{{ $company->company_name }}</td>
							<td>{{ $company->ruc }}</td>
							<td>{{ $company->name }}</td>
							<td>{{ $company->email }}</td>
							<td>{{ $company->phone }}</td>
							<td>@if( $company->provider  == 1 ) si @else no @endif </td>
							<td>@if( $company->client  == 1 ) si @else no @endif </td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
					
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<!-- paginado inferior -->

	</div>
    <div class="col-md-6">
	    {!! $companies->setPath('')->appends(['rows' => Input::get('rows')])->render() !!}
	</div>
		<div class="col-md-6 text-right">

			          


		</div>

</div>
@endsection