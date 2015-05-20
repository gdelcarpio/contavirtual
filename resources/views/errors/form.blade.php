@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error!</strong> Se encontraron los siguientes problemas.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif