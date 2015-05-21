@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">CAMBIAR CONTRASEÑA
				</div>

				@include('errors.form')

				<div class="panel-body">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">

							{!! Form::open(['route' => 'users.password.update', 'method' => 'PATCH', 'role' => 'form']) !!}

					            <div class="form-group">
					              <label for="email">Contraseña</label>
					              {!! Form::password('old_password', ['class' => 'form-control text-center', 'placeholder' => 'Mínimo 6 caracteres', 'required', 'minlength' => '6', 'maxlength' => '20']) !!}
					            </div>
					            <hr>
					            <div class="form-group">
					              <label for="password">Nueva Contraseña</label>
					              {!! Form::password('password', ['class' => 'form-control text-center', 'placeholder' => 'Mínimo 6 caracteres', 'required', 'minlength' => '6', 'maxlength' => '20']) !!}
					            </div>

					            <div class="form-group">
					              <label for="password_confirmation">Confirmación de Nueva Contraseña</label>
					              {!! Form::password('password_confirmation', ['class' => 'form-control text-center', 'placeholder' => 'Mínimo 6 caracteres', 'required', 'minlength' => '6', 'maxlength' => '20']) !!}
					            </div>

					            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>

					        {!! Form::close() !!}

						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
