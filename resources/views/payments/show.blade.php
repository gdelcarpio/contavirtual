@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">DETALLE DE PAGO</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	
	<div class="col-xs-8">
		<div class="box">
			<div class="box-header">
				<div class="box-name">

				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					<h4 class="page-header">Pago #{{ $payment->id }} / <a href="{{ route('users.show', $payment->user->id) }}" title="">{{ $payment->user->name }} {{ $payment->user->lastname }}</a></h4>
					<h4 class="page-header"></h4>
					<p>
						<span>Fecha de Pago: {{ $payment->payment_date }}</span> <br>
						<span>Fecha de Vencimiento: {{ $payment->payment_expiration_date }}</span> <br>
					</p>
				</div>
				<div class="card address">
					<p>
						<span>Monto: {{ $payment->amount }}</span> <br>
						<span>Inicio: {{ $payment->start_date }}</span> <br>
						<span>Fin: {{ $payment->end_date }}</span> <br>
						<span>Código: {{ $payment->code}}</span>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection