<!-- Codigo Usuario-->
<div class="form-group">
	{!! Form::label('user_id', 'Codigo usuario:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::label('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
	</div>

</div>

<!-- Compañia -->
<div class="form-group">
	{!! Form::label('company_name', 'Compañia:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('company_name', null, ['class' => 'form-control']) !!}
	</div>

</div>

<!-- RUC -->
<div class="form-group">
	{!! Form::label('ruc', 'RUC:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('ruc', null, ['class' => 'form-control', 'maxlength'=>'11']) !!}
	</div>

</div>

<!-- Direccion -->
<div class="form-group">
	{!! Form::label('tax_address', 'Dirección:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('tax_address', null, ['class' => 'form-control']) !!}
	</div>

</div>

<!-- Primer Nombre -->
<div class="form-group">
	{!! Form::label('name', 'Primer nombre:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

</div>

<!-- Segundo Nombre -->
<div class="form-group">
	{!! Form::label('lastname', 'Segundo nombre:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
	</div>

</div>

<!-- Cargo -->
<div class="form-group">
	{!! Form::label('relationship', 'Cargo:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('relationship', null, ['class' => 'form-control', 'placeholder'=>'Ejem: Gerente, Jefe...']) !!}
	</div>

</div>

<!-- Email -->
<div class="form-group">
	{!! Form::label('email', 'Email:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'ejemplo@example.com']) !!}
	</div>

</div>

<!-- Telefono de Oficina -->
<div class="form-group">
	{!! Form::label('office_phone', 'Telefono oficina:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('office_phone', null, ['class' => 'form-control', 'placeholder'=>'2325546']) !!}
	</div>

</div>

<!-- Celular -->
<div class="form-group">
	{!! Form::label('phone', 'Celular', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder'=>'985485685']) !!}
	</div>

</div>
							
<!-- Pagina web -->
<div class="form-group">
	{!! Form::label('web', 'Web', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">			
		{!! Form::text('web', null, ['class' => 'form-control', 'placeholder'=>'www.ejemplo.com']) !!}
	</div>

</div>
	
<!-- Departamento -->
<div class="form-group">
	{!! Form::label('department_id', 'Departamento:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">
		{!! Form::select('department_id', $options['departments'], null, ['class' => 'form-control', 'required', 'id' => 'department_id']) !!}
	</div>

</div>

<!-- Provincia -->
<div class="form-group">
	{!! Form::label('province_id', 'Provincia:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">
		{!! Form::select('province_id', $options['provinces'], null, ['class' => 'form-control', 'required', 'id' => 'province_id', 'disabled','disabled']) !!}
	</div>

</div>

<!-- Distrito -->
<div class="form-group">
	{!! Form::label('district_id', 'Distrito:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">
		{!! Form::select('district_id', $options['districts'], null, ['class' => 'form-control', 'required', 'id' => 'district_id', 'disabled','disabled']) !!}
	</div>

</div>

<!-- Ciudad -->
<div class="form-group">
	{!! Form::label('country', 'Ciudad:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">	
		{!! Form::text('country', null, ['class' => 'form-control', 'placeholder'=>'']) !!}
	</div>

</div>

<!-- Observacion -->
<div class="form-group clearfix">
	{!! Form::label('observations', 'Observacion:', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-8">	
		{!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder'=>'', 'rows'=>'4']) !!}
	</div>

</div>

<!-- ACTIVO  -->
<div class="form-group">
	{!! Form::label('active', 'Activo', ['class' => 'col-sm-4 label-control']) !!}

	<div class="col-sm-5">	
		Cliente	
		{!! Form::radio('client', '1', true ) !!}
		Proveedor	
		{!! Form::radio('client', '0', false ) !!}
	</div>
				
</div>

{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
							
{!! Form::hidden('provider', 0, ['class' => 'form-control']) !!}
