@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">LISTA DE USUARIOS</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
				<ul class="nav nav-pills" role="tablist">
					<li class="presentation {{ active_link( Input::get('role'), '' ) }}">
				  		<a href="{{ route('users.index') }}">Todos</a>
				  		<span class="badge">{{ $count['users'] }}</span>
				  	</li>
				  	<li class="presentation {{ active_link( Input::get('role'), 'user' ) }}">
				  		{!! role_filter('user', 'Usuarios', url_alias()) !!}
				  		<span class="badge">{{ $count['clients'] }}</span>
				  	</li>
				  	<li class="presentation {{ active_link( Input::get('role'), 'admin' ) }}">
				  		{!! role_filter('admin', 'Administradores', url_alias()) !!}
				  		<span class="badge">{{ $count['administrators'] }}</span>
				  	</li>
				  	<li class="presentation {{ active_link( Input::get('role'), 'accountant' ) }}">
				  		{!! role_filter('accountant', 'Contadores', url_alias()) !!}
				  		<span class="badge">{{ $count['accountants'] }}</span>
				  	</li>
				</ul>
			</div>
			<div class="col-md-6 text-right">
				<div class="btn-group">
				  <a href="{{ route('users.create') }}"  class="btn btn-danger">
				    <i class="fa fa-plus"></i> Registrar Usuario
				  </a>
				</div>
			</div>
		</div>

	<div class="row">
		<hr class="dividor">

		<div class="col-md-6">

			@include('partials.search-form')
			
			@include('partials.rows-form')

		</div>

		<div class="col-md-6 text-right">

			@include('partials.goto-form') 

			<a href="{{ route('users.export.excel') }}" class="btn btn-success"><i class="fa fa-upload"></i> Exportar todos</a>       

		</div>

	</div>

		<div class="box">
		
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th>
								<i class="fa fa-{{ show_sort_icon('id', $column, $direction) }}"></i>
          						{!! sort_model_by('id', 'ID', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
          						{!! sort_model_by('name', 'Nombres', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('lastname', $column, $direction) }}"></i>
          						{!! sort_model_by('lastname', 'Apellidos', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('email', $column, $direction) }}"></i>
          						{!! sort_model_by('email', 'Correo', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('active', $column, $direction) }}"></i>
          						{!! sort_model_by('active', 'Estado', url_alias()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('scale', $column, $direction) }}"></i>
          						{!! sort_model_by('scale', 'Nivel', url_alias()) !!}
							</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($users as $user)
							<tr data-id="{{ $user->id }}" data-type="el usuario" data-name="{{ $user->lastname }}">
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->email }}</td>
					          	<td class="text-center">

									{!! Form::open([ 'route' => ['users.active', $user->id], 'method' => 'PATCH', 'id' => 'form-user-active', 'onSubmit' => 'return confirm("¿Está seguro de cambiar el estado de este usuario?")']) !!}
										<button type="submit" data-toggle="tooltip" data-placement="top" data-original-title="Cambiar Estado" class="btn btn-{{ $user->active ? 'success' : 'danger' }} user-active">
										{{ $user->active ? '&nbsp;&nbsp;Activo&nbsp;&nbsp;' : 'Inactivo' }}
										</button>
									{!! Form::close() !!}

								</td>
								<td>{{ $user->level->name }}</td>
								<td class="text-center">
						            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" class="option-icons row-delete"><i class="fa fa-trash-o fa-lg"></i></a>
            						<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restablecer Contraseña" class="option-icons row-reset"><i class="fa fa-key fa-lg"></i></a>
									<a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><i class="fa fa-pencil fa-lg"></i></a>
									<a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalle"><i class="fa fa-bars fa-lg"></i></a>
									<span class="badge pull-right">{{ $user->payments->count() }}</span>
									<a href="{{ route('users.payments.index', $user->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pagos"><i class="fa fa-credit-card fa-lg"></i></a>

								</td>
							</tr>
						@empty
							<tr>
								<td align="center" colspan="20">No se encontraron registros.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>

		</div>
		
		{!! $users->setPath('')->appends( array('role' => Input::get('role'), 'q' => Input::get('q') ,'column' => Input::get('column'),'direction' => Input::get('direction'), 'rows' => Input::get('rows') ) )->render() !!}

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

{!! Form::open([ 'route' => ['users.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

{!! Form::close() !!}

<!-- RESET FORM -->

{!! Form::open([ 'route' => ['users.password.reset', ':ROW_ID'], 'method' => 'PATCH', 'id' => 'form-reset']) !!}

{!! Form::close() !!}

@endsection

@section('ajax-scripts')

  @include('scripts.ajax-delete')
  @include('scripts.ajax-reset')

@endsection