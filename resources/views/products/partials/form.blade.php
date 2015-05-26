<!-- CODIGO -->

	<div class="form-group">
		
		{!! Form::label('code', 'Código:', ['class' => 'col-sm-4 label-control']) !!}
		<div class="col-sm-8">			
			{!! Form::text('code', null, ['class' => 'form-control']) !!}
		</div>	
						
	</div>


<!-- NOMBRE -->

	<div class="form-group">
		
		{!! Form::label('name', 'Nombre:', ['class' => 'col-sm-4 label-control']) !!}
		<div class="col-sm-8">			
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>	
						
	</div>

<!-- DESCRIPCION -->

	<div class="form-group">
		
		{!! Form::label('description', 'Descripción:', ['class' => 'col-sm-4 label-control']) !!}
		<div class="col-sm-8">			
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>	
						
	</div>

	<!-- PRECIO -->

	<div class="form-group clearfix">
		
		{!! Form::label('price', 'Precio unit. (sin IGV):', ['class' => 'col-sm-4 label-control']) !!}		
		<div class="col-sm-5">			
		{!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '00.00']) !!}
		</div>	
		
						
	</div>


<!-- ACTIVO  -->
	<div class="form-group">
		
		{!! Form::label('active', 'Activo', ['class' => 'col-sm-4 label-control']) !!}		
		<div class="col-sm-5">	
		Si	
		{!! Form::radio('active', '1', true ) !!}
		No	
		{!! Form::radio('active', '0', false ) !!}
		</div>	
						
	</div>