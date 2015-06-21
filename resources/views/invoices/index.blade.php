@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">COMPROBANTES DE PAGO - {{ Str::upper($page['title']) }}</a></li>
		</ol>
	</div>
</div> 		
	
	<div class="row">

		<div class="col-sm-10">

			@include('partials.date-form')

		</div>
		<div class="col-md-2 text-right">
			<a href="{{ route($page['create']) }}"  class="btn btn-danger crear_documento">
				<i class="fa fa-plus"></i> Nuevo Comprobante
			</a>					
		</div>	

	</div>
	<hr class="dividor">

	<div class="row">

		<div class="col-md-6">

			@include('partials.search-form')
			
			@include('partials.rows-form')

		</div>

		<div class="col-md-6 text-right">

 			@include('partials.goto-form')

			<a href="{{ route($page['excel']) }}" class="btn btn-success"><i class="fa fa-upload"></i> Exportar a Excel </a>
		</div>

	</div>
		<div class="box">
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th>
								<i class="fa fa-{{ show_sort_icon('id', $column, $direction) }}"></i>
          						{!! sort_model_by('id', 'ID', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('issue_date', $column, $direction) }}"></i>
          						{!! sort_model_by('issue_date', 'Emisión', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('expiration_date', $column, $direction) }}"></i>
          						{!! sort_model_by('expiration_date', 'Vencimiento', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('invoice', $column, $direction) }}"></i>
          						{!! sort_model_by('invoice', 'Tipo doc.', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('serial', $column, $direction) }}"></i>
          						{!! sort_model_by('serial', 'N° Doc.', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('company', $column, $direction) }}"></i>
          						{!! sort_model_by('company', 'Empresa', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('ruc', $column, $direction) }}"></i>
          						{!! sort_model_by('ruc', 'RUC', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('subtotal', $column, $direction) }}"></i>
          						{!! sort_model_by('subtotal', 'Subtotal', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('igv', $column, $direction) }}"></i>
          						{!! sort_model_by('igv', 'IGV', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('total', $column, $direction) }}"></i>
          						{!! sort_model_by('total', 'Total', url_alias()) !!}
							</th>
							<th><a href="#"><i class="fa fa-sort"></i> Opciones</a></th>
						</tr>
					</thead>
					<tbody>
						@forelse($invoices as $invoice)
							<tr data-id="{{ $invoice->id }}" data-type="el comprobante" data-name="{{ $invoice->id }}">
								<td>{{ $invoice->id }}</td>
								<td>{{ $invoice->issue_date }}</td>
								<td>{{ $invoice->expiration_date }}</td>
								<td>{{ $invoice->invoiceType->name }}</td>
								<td>{{ $invoice->serial }} - {{ $invoice->number }}</td>
								<td>{{ $invoice->company }}</td>
								<td>{{ $invoice->ruc  }}</td>
								<td>PEN {{ $invoice->subtotal }}</td>
								<td>PEN {{ $invoice->igv }}</td>
								<td>PEN {{ $invoice->total }}</td>
								<td class="text-center">
						            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" class="option-icons row-delete"><i class="fa fa-trash-o fa-lg"></i></a>
									<a href="{{ route($page['edit'], $invoice->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><i class="fa fa-pencil fa-lg"></i></a>
									<a href="{{ route($page['show'], $invoice->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalle"><i class="fa fa-bars fa-lg"></i></a>
									<a href="{{ route('credit-notes.create', $invoice->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Nota de Crédito"><i class="fa fa-plus fa-lg"></i></a>
								</td>
							</tr>
						@empty
							<tr>
								<td align="center" colspan="20">No se encontraron registros.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>

		{!! $invoices->setPath('')->appends( array( 'q' => Input::get('q') ,'column' => Input::get('column'),'direction' => Input::get('direction'), 'rows' => Input::get('rows'), 'from' => Input::get('from'), 'to' => Input::get('to') ) )->render() !!}
	
	</div>
  	
  	<div class="col-md-6">Mostrando 23 de 1520 resultados</div>

	<div class="col-md-6 text-right">

		<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               

	</div>
</div>

<!-- DELETE FORM -->

{!! Form::open([ 'route' => [$page['destroy'], ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

{!! Form::close() !!}

@endsection

@section('ajax-scripts')

  @include('scripts.ajax-delete')

@endsection