<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>EXCEL EXPORT</title>
</head>
<body>

	<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
		<thead>
			<tr>
				<th>ID</th>
				<th>Emisión</th>
				<th>Vencimiento</th>
				<th>Comprobante</th>
				<th>N° Comprobante</th>
				<th>Empresa</th>
				<th>RUC</th>
				<th>Subtotal</th>
				<th>IGV</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@forelse($invoices as $invoice)
				<tr>
					<td>{{ $invoice->id }}</td>
					<td>{{ $invoice->issue_date }}</td>
					<td>{{ $invoice->expiration_date }}</td>
					<td>{{ $invoice->invoiceType->name }}</td>
					<td>{{ $invoice->serial }} - {{ $invoice->number }}</td>
					<td>{{ $invoice->company->company_name }}</td>
					<td>{{ $invoice->ruc  }}</td>
					<td>PEN {{ $invoice->subtotal }}</td>
					<td>PEN {{ $invoice->igv }}</td>
					<td>PEN {{ $invoice->total }}</td>
				</tr>
			@empty
				<tr>
					<td align="center" colspan="20">No se encontraron registros.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	
</body>
</html>