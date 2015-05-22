<h3>Datos De Pago</h3>

<div class="row">

	<div class="form-group has-feedback">

		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Fecha de Pago</label>
			<div class="col-sm-8">
				{!! Form::text('payment_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'payment_date']) !!}
				<span class="fa fa-calendar form-control-feedback"></span>
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Vencimiento</label>
			<div class="col-sm-8">
				{!! Form::text('payment_expiration_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'payment_expiration_date']) !!}
				<span class="fa fa-calendar form-control-feedback"></span>
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Monto</label>
			<div class="col-sm-8">
			{!! Form::input('number', 'amount', null, ['class' => 'form-control text-center', 'placeholder' => 'Monto', 'required', 'step' => '0.01','id' => 'amount']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">N° Boleta / Factura</label>
			<div class="col-sm-8">
			{!! Form::text('invoice', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 10 caracteres', 'required', 'minlength' => '2', 'maxlength' => '10', 'id' => 'invoice']) !!}
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group has-feedback">
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Inicio</label>
			<div class="col-sm-8">
				{!! Form::text('start_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'start_date']) !!}
				<span class="fa fa-calendar form-control-feedback"></span>
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Fin</label>
			<div class="col-sm-8">
				{!! Form::text('end_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'end_date']) !!}
				<span class="fa fa-calendar form-control-feedback"></span>
			</div>	
		</div>
	</div>
</div>

<div class="linea"></div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Usuario</label>
			<div class="col-sm-8">
				{!! Form::select('user_id', $users, null, ['class' => 'form-control', 'required', 'id' => 'user_id']) !!}
			</div>	
		</div>
		<div class="col-sm-6">
			<label class="col-sm-4 control-label">Código</label>
			<div class="col-sm-8">
			{!! Form::text('code', null, ['class' => 'form-control text-center', 'placeholder' => 'Máximo 10 caracteres', 'required', 'minlength' => '2', 'maxlength' => '10', 'id' => 'code']) !!}
			</div>	
		</div>
	</div>
</div>					

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

