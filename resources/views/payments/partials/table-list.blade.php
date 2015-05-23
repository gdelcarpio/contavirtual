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