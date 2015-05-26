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
				  <li role="presentation" class="active"><a href="{{ route('users.index') }}">Todos <span class="badge">{{ $count['users'] }}</span></a></li>
				  <li role="presentation"><a href="#">Administradores <span class="badge">{{ $count['administrators']}}</span></a></li>
				  <li role="presentation"><a href="#">Usuarios <span class="badge">{{ $count['clients']}}</span></a></li>
				  <li role="presentation"><a href="#">Contadores <span class="badge">{{ $count['accountants']}}</span></a></li>
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

			<form class="form-inline" style="display:inline-block">
			  <div class="form-group">		    
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="buscar">
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			|
			<form name="form_salto" method="POST" action="mensajes.php" class="form-inline" style="display:inline-block">
       
	          <label>Número de filas:</label>
	          
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

		<div class="col-md-6 text-right">

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
							<th>
								<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
          						{!! sort_model_by('name', 'Nombres', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('lastname', $column, $direction) }}"></i>
          						{!! sort_model_by('lastname', 'Apellidos', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('email', $column, $direction) }}"></i>
          						{!! sort_model_by('email', 'Correo', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('active', $column, $direction) }}"></i>
          						{!! sort_model_by('active', 'Estado', Route::currentRouteName()) !!}
							</th>
							<th>
								<i class="fa fa-{{ show_sort_icon('scale', $column, $direction) }}"></i>
          						{!! sort_model_by('scale', 'Nivel', Route::currentRouteName()) !!}
							</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr data-id="{{ $user->id }}" data-type="el usuario" data-name="{{ $user->lastname }}">
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
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		
		{{-- {!! $users->setPath('')->render() !!} --}}

		{!! $users->setPath('')->appends(array('q' => Input::get('q') ,'column' => Input::get('column'),'direction' => Input::get('direction')))->render() !!}

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