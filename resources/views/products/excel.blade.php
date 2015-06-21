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
				<th>Código</th>
				<th>Nombre</th>
				<th>Precio Unitario (sin IGV)</th>
				<th>Activo</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			@forelse($products as $product)
				<tr>
					<td>{{ $product->code }}</td>
					<td>{{ $product->name }}</td>
					<td>PEN {{ $product->price }}</td>
					<td>{{ $product->active == 1 ? 'Sí' : 'No' }}</td>
					<td>{{ $product->description }}</td>
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