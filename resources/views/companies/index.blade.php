@extends('app')

@section('content')

@include('companies.partials.header')

<div class="row">
	<div class="col-xs-12">
		<div class="row">
			@include('companies.partials.report')
			<div class="col-md-6 text-right">
				<div class="btn-group">
			  		<a href="{{route('companies.create')}}"  class="btn btn-danger crear_documento">
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
						@include('companies.partials.header-table')
					</thead>
					<tbody>
						@foreach($companies as $company)
						<tr data-id="{{ $company->id }}">
							<td>{{ $company->company_name }}</td>
							<td>{{ $company->ruc }}</td>
							<td>{{ $company->name }}</td>
							<td>{{ $company->email }}</td>
							<td>{{ $company->phone }}</td>
							<td>@if( $company->provider  == 1 ) si @else no @endif </td>
							<td>@if( $company->client  == 1 ) si @else no @endif </td>
							<td>
								<a href="{{ route('companies.edit', $company->id) }}">Editar</a>
								<a href="#" class="btn-delete">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class='notifications bottom-right'></div>
	</div>

	<!-- paginado inferior -->

	</div>
    <div class="col-md-6">
	    {!! $companies->setPath('')->appends(['rows' => Input::get('rows')])->render() !!}
	</div>

	<div class="col-md-6 text-right">
	</div>
</div>

{!! Form::open(['route'=>['companies.destroy', ':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete']) !!}

@endsection

@section('scripts')
<script>
	$(function(){
		$('.btn-delete').on('click', function(e){
			e.preventDefault();
			var row = $(this).parents('tr');
			
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':USER_ID', id);
			var data = form.serialize();
			
			row.fadeOut();

			$.post(url, data, function(result){
				alert(result.id+' - '+result.message);
			}).fail(function(){
				row.show();
				alert('El usuario no fue eliminado');
			});
			
		});
	});
</script>
@endsection