@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">LISTA DE PAGOS</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6 text-right">
				<div class="btn-group">
				  <a href="{{ route('payments.create') }}"  class="btn btn-danger">
				    <i class="fa fa-plus"></i> Agregar Pago
				  </a>
				</div>
			</div>
		</div>

	<div class="row">
		<hr class="dividor">

		<div class="col-md-6">

			<form class="form-inline" style="display:inline-block">
			  <div class="form-group">		    
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="buscar">
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			|
			<form name="form_salto" method="POST" action="mensajes.php" class="form-inline" style="display:inline-block">
       
	          <label>Número de filas:</label>
	          
	          <div class="form-group">   
	            
	            <select class="form-control input-sm input-group" id="filas_x_pagina" name="filas_x_pagina"  onchange="this.form.submit();">              

	              <option value="10" >10</option>
	              <option value="25" >25</option>
	              <option value="50" >50</option>
	              <option value="100" >100</option>
	            
	            </select>

	          </div>

	        </form>

		</div>

		<div class="col-md-6 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

		    <form id="pog1" method="get" style="display:inline-block" >
	        	<input id="pag_actual1" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
		    </form>
	   
	    	<a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               

		</div>

	</div>

		<div class="box">
		
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th><a href="#"><i class="fa fa-sort"></i> ID</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Usuario</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Fecha de Pago</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Fecha Limite de Pago</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Monto</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Doc Pago</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Inicio</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Fin</a></th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($payments as $payment)
							<tr data-id="{{ $payment->id }}" data-type="el pago" data-name="{{ $payment->id }}">
								<td>{{ $payment->id }}</td>
								<td>{{ $payment->user->name }} {{ $payment->user->lastname }}</td>
								<td>{{ $payment->payment_date }}</td>
								<td>{{ $payment->payment_expiration_date }}</td>
								<td>{{ $payment->amount }}</td>
								<td>{{ $payment->invoice }}</td>
								<td>{{ $payment->start_date }}</td>
								<td>{{ $payment->end_date }}</td>
								<td class="text-center">
						            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" class="option-icons row-delete"><i class="fa fa-trash-o fa-lg"></i></a>
									<a href="{{ route('payments.edit', $payment->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><i class="fa fa-pencil fa-lg"></i></a>
									<a href="{{ route('payments.show', $payment->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalle"><i class="fa fa-bars fa-lg"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		
		{!! $payments->setPath('')->render() !!}

		<!-- paginado inferior -->

	</div>

{{--     <div class="col-md-6">
	    Mostrando 23 de 1520 resultados
	</div>
	<div class="col-md-6 text-right">

		<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               

	</div> --}}

</div>

<!-- DELETE FORM -->

{!! Form::open([ 'route' => ['payments.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

{!! Form::close() !!}


@endsection

@section('ajax-scripts')

  @include('scripts.ajax-delete')

@endsection