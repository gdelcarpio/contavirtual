<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Estado</th>
			<th>Nivel</th>
		</tr>
	</thead>
	<tbody>
		@forelse($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->lastname }}</td>
				<td>{{ $user->email }}</td>
	          	<td>{{ $user->active ? 'Activo' : 'Inactivo' }}</td>
				<td>{{ $user->level->name }}</td>
			</tr>
		@empty
			<tr>
				<td align="center" colspan="20">No se encontraron registros.</td>
			</tr>
		@endforelse
	</tbody>
</table>