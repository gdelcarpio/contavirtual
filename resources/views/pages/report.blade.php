@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">REPORTE</a></li>
		</ol>
	</div>
</div> 		
	
	<div class="row">

		<div class="col-sm-10">

			@include('partials.date-form')

		</div>
		
	</div>
	<hr class="dividor">

		<div class="box">
			<div class="box-content">

				<h3># {{ $report['sales']['count'] }} / Comprobantes de Venta / PEN {{ $report['sales']['total'] }}</h3>

			    <table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
			      <col>
			      <colgroup span="2"></colgroup>
			      <colgroup span="2"></colgroup>
			      <tr>
			        <td rowspan="2">VENTAS</td>
			      </tr>
			      <tr>
			        @foreach($report['sales']['month'] as $sale )
			        <th scope="col">{{ $sale->month }} - {{ $sale->year }}</th>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">#</th>
			        @foreach($report['sales']['month'] as $sale)
			        <td>{{ $sale->count}}</td>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">Suma</th>
			        @foreach($report['sales']['month'] as $sale)
			        <td>{{ $sale->total}}</td>
			        @endforeach
			      </tr>
			    </table>

			    <h3># {{ $report['expenses']['count'] }} / Comprobantes de Compra / PEN {{ $report['expenses']['total'] }}</h3>

			    <table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
			      <col>
			      <colgroup span="2"></colgroup>
			      <colgroup span="2"></colgroup>
			      <tr>
			        <td rowspan="2">COMPRAS</td>
			      </tr>
			      <tr>
			        @foreach($report['expenses']['month'] as $expense )
			        <th scope="col">{{ $expense->month }} - {{ $expense->year }}</th>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">#</th>
			        @foreach($report['expenses']['month'] as $expense)
			        <td>{{ $expense->count}}</td>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">Total</th>
			        @foreach($report['expenses']['month'] as $expense)
			        <td>{{ $expense->total}}</td>
			        @endforeach
			      </tr>
			    </table>

			    <h3># {{ $report['credit_notes']['count'] }} / Notas de Crédito / PEN {{ $report['credit_notes']['total'] }}</h3>

			    <table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
			      <col>
			      <colgroup span="2"></colgroup>
			      <colgroup span="2"></colgroup>
			      <tr>
			        <td rowspan="2">N. CÉDITO</td>
			      </tr>
			      <tr>
			        @foreach($report['credit_notes']['month'] as $credit_note )
			        <th scope="col">{{ $credit_note->month }} - {{ $credit_note->year }}</th>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">#</th>
			        @foreach($report['credit_notes']['month'] as $credit_note)
			        <td>{{ $credit_note->count}}</td>
			        @endforeach
			      </tr>
			      <tr>
			        <th scope="row">Total</th>
			        @foreach($report['credit_notes']['month'] as $credit_note)
			        <td>{{ $credit_note->total}}</td>
			        @endforeach
			      </tr>
			    </table>
			</div>
		</div>

@endsection