@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">FACTURAS DE VENTA</a></li>
			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
	


		
	
<div class="row">
	<div class="col-xs-12">
		
		

	
	<div class="row">

		<div class="col-sm-10">

			<form class="form-inline">
			  <div class="form-group">
			    <label for="exampleInputName2">Desde</label>
			    <input type="text" class="form-control" id="input_date_desde" placeholder="dd/mm/yyyy">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail2">Hasta</label>
			    <input type="text" class="form-control" id="input_date_hasta" placeholder="dd/mm/yyyy">
			  </div>
			  <button type="submit" class="btn btn-primary">Filtrar por fecha</button>
			  <a href="#" class="btn btn-success">Todas las fechas</a>
			</form>

		</div>
		<div class="col-md-2 text-right">
					<a href="paginas/factura-crear.html"  class="btn btn-danger crear_documento">
						<i class="fa fa-plus"></i> Nueva Factura
					</a>					
			</div>	

	</div>
	<hr class="dividor">

	<div class="row">
		


		<div class="col-md-9">


			<form class="form-inline" style="display:inline-block">
			  <div class="form-group">		    
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="buscar">
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			|
				<form name="form_salto" method="POST" action="mensajes.php" class="form-inline" style="display:inline-block">
           
                <label>Número de filas: </label>
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

		<div class="col-md-3 text-right">

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
							<th><a href="#"><i class="fa fa-sort"></i> Emisión</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Vencimiento</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Tipo doc.</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> N° Doc.</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Empresa</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> RUC</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Subtotal</a></th>
							
							<th><a href="#"><i class="fa fa-sort"></i> IGV</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Total</a></th>							
							
						</tr>
					</thead>
					<tbody>
						
							<tr>

							@foreach($invoices as $invoice)
								<td>{{ $invoice->issue_date }}</td>
								<td>{{ $invoice->expiration_date }}</td>
								<td>{{ $invoice->invoiceType->name }}</td>
								<td>{{ $invoice->serial }} - {{ $invoice->number }}</td>
								<td>{{ $invoice->company->company_name }}</td>
								<td>{{ $invoice->company->ruc  }}</td>
								<td>PEN {{ $invoice->subtotal }}</td>
								
								<td>PEN {{ $invoice->igv }}</td>
								<td>PEN {{ $invoice->total }}</td>
							</tr>
					  
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	
	</div>
  <div class="col-md-6">
	    Mostrando 23 de 1520 resultados</div>
		<div class="col-md-6 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               


		</div>
</div>

@endsection