<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
	<thead>
		<tr>
			<th>
				<i class="fa fa-{{ show_sort_icon('id', $column, $direction) }}"></i>
				{!! sort_model_by('id', 'ID', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
				{!! sort_model_by('name', 'Usuario', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('payment_date', $column, $direction) }}"></i>
				{!! sort_model_by('payment_date', 'Fecha de Pago', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('payment_expiration_date', $column, $direction) }}"></i>
				{!! sort_model_by('payment_expiration_date', 'Vencimiento', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('amount', $column, $direction) }}"></i>
				{!! sort_model_by('amount', 'Monto', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('invoice', $column, $direction) }}"></i>
				{!! sort_model_by('invoice', 'Doc de Pago', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('start_date', $column, $direction) }}"></i>
				{!! sort_model_by('start_date', 'Inicio', Route::currentRouteName()) !!}
			</th>
			<th>
				<i class="fa fa-{{ show_sort_icon('end_date', $column, $direction) }}"></i>
				{!! sort_model_by('end_date', 'Fin', Route::currentRouteName()) !!}
			</th>
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