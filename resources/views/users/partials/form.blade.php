<h3>Datos Personales</h3>

<div class="row">

	<div class="form-group">

		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Nombres</label>
			<div class="col-sm-9">
			{!! Form::text('name', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 20 caracteres', 'required', 'minlength' => '2', 'maxlength' => '20', 'id' => 'name']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Apellidos</label>
			<div class="col-sm-9">
				{!! Form::text('lastname', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 30 caracteres', 'required', 'minlength' => '2', 'maxlength' => '30', 'id' => 'lastname']) !!}
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Teléfono / Celular</label>
			<div class="col-sm-9">
			{!! Form::text('phone', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 15 caracteres', 'required', 'minlength' => '2', 'maxlength' => '15', 'id' => 'phone']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Teléfono Casa / Oficina</label>
			<div class="col-sm-9">
			{!! Form::text('office_phone', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 10 caracteres', 'required', 'minlength' => '2', 'maxlength' => '10', 'id' => 'office_phone']) !!}
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Correo</label>
			<div class="col-sm-9">
				{!! Form::text('email', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 30 caracteres', 'required', 'minlength' => '5', 'maxlength' => '30', 'id' => 'email']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">DNI</label>
			<div class="col-sm-9">
				{!! Form::text('dni', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 10 caracteres', 'required', 'minlength' => '2', 'maxlength' => '10', 'id' => 'dni']) !!}
			</div>	
		</div>
	</div>
</div>


<div class="linea"></div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">País</label>
			<div class="col-sm-9">
				{!! Form::text('country', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 20 caracteres', 'required', 'minlength' => '2', 'maxlength' => '40', 'id' => 'country']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Dirección</label>
			<div class="col-sm-9">
				{!! Form::text('address', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 40 caracteres', 'required', 'minlength' => '2', 'maxlength' => '40', 'id' => 'address']) !!}
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-4">
			<label class="col-sm-12 xcontrol-label text-center">Departamento</label>
			<div class="col-sm-12">
				{!! Form::select('department_id', $departments, null, ['class' => '', 'required', 'id' => 'department_id']) !!}
			</div>	
		</div>
		<div class="col-sm-4">
			<label class="col-sm-12 xcontrol-label text-center">Provincia</label>
			<div class="col-sm-12" id="province">
				<select id="province_id" name="province_id" class="" required>
		          <option>Seleccione</option>
		        </select>
			</div>	
		</div>
		<div class="col-sm-4">
			<label class="col-sm-12 xcontrol-label text-center">Distrito</label>
			<div class="col-sm-12" id="district">
				<select id="district_id" name="district_id" class="" required>
		          <option>Seleccione</option>
		        </select>
			</div>	
		</div>
	</div>
</div>
<div class="linea"></div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Razón Social</label>
			<div class="col-sm-9">
				{!! Form::text('company_name', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 20 caracteres', 'required', 'minlength' => '2', 'maxlength' => '40', 'id' => 'company_name']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">RUC</label>
			<div class="col-sm-9">
				{!! Form::text('ruc', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 15 caracteres', 'required', 'minlength' => '2', 'maxlength' => 'ruc', 'id' => 'ruc']) !!}
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Llave SOL</label>
			<div class="col-sm-9">
				{!! Form::text('sol_key', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 20 caracteres', 'required', 'minlength' => '2', 'maxlength' => '40', 'id' => 'sol_key']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-2 control-label">Cuenta de Banco</label>
			<div class="col-sm-9">
				{!! Form::text('bn_account', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 40 caracteres', 'required', 'minlength' => '2', 'maxlength' => '40', 'id' => 'bn_account']) !!}
			</div>	
		</div>
	</div>
</div>

@if( is_admin() )

	<div class="linea"></div>

	<div class="row">
		<div class="form-group">
			<div class="col-sm-6">
				<label class="col-sm-2 control-label">Nivel</label>
				<div class="col-sm-9">
					{!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'required', 'id' => 'level_id']) !!}
				</div>	
			</div>
		</div>
	</div>	

@endif				

</div>


<div class="linea col-md-12"></div>

<div class="row">
<div class="col-sm-12 text-center">
	<div class="form-group">
			
		{{-- <button type="submit" class="btn btn-primary">Guardar como borrador</button> --}}
		<button type="submit" class="btn btn-danger">{{ $submitButton }}</button>
			
	</div>
</div>
</div>

