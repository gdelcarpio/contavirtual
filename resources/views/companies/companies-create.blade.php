<link href="plugins/select2/select2.css" rel="stylesheet">
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">GASTOS</a></li>
			<li><a href="index.html">Crear</a></li>
		</ol>
	</div>
</div> 




<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">


			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-text-o"></i>
					<span>NUEVA EMPRESA</span>
				</div>			
			</div>


			<div class="box-content">




				<form id="defaultForm" method="post" action="validators.html" class="form-horizontal">






					<h3>Datos de la Empresa</h3>	
<div class="row">
<div class="col-sm-6">

	
	<div class="form-group">

		<label class="col-sm-3 control-label">Tipo</label>
		<div class="col-sm-9"><div class="checkbox-inline">
							<label>
								<input type="checkbox" checked=""> Cliente
								<i class="fa fa-square-o small"></i>
							</label>
						</div>
						<div class="checkbox-inline">
							<label>
								<input type="checkbox"> Porveedor
								<i class="fa fa-square-o small"></i>
							</label>
						</div></div>
						
					
					</div>

	


				<div class="form-group">
							<label class="col-sm-3 control-label">Razón Social</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="" name="serie" />
							</div>	
						
				</div>

				<div class="form-group">
							<label class="col-sm-3 control-label">RUC</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="" name="serie" />
							</div>	
						</div>
						



					



<!-- datos de cliente -->
						<div class="form-group">
							<label class="col-sm-3 control-label">Dirección</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="" name="direccion" />
							</div>							
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Distrito</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" placeholder="" name="distrito" />
							</div>	
						
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Provincia</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" placeholder="" name="provincia" />
							</div>	

												
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Departamento</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" placeholder="" name="departamento" />
							</div>							
						</div>


</div>




<div class="col-sm-6">


<!-- datos de la factura -->

						<div class="form-group">
							<label class="col-sm-3 col-xs-2 control-label">Contacto</label>
							<div class="col-sm-4 col-xs-4">
								<input type="text" class="form-control" placeholder="Nombre" name="serie" />
							</div>
							<div class="col-sm-4 col-xs-4">
								<input type="text" class="form-control" placeholder="Apellido" name="numero" />
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-3 col-xs-2 control-label">Teléfonos</label>
							<div class="col-sm-4 col-xs-4">
								<input type="text" class="form-control" placeholder="Oficina" name="serie" />
							</div>
							<div class="col-sm-4 col-xs-4">
								<input type="text" class="form-control" placeholder="Celular" name="numero" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">E-mail</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" placeholder="E-mail" name="departamento" />
							</div>							
						</div>




						<div class="form-group has-feedback">

							<label class="col-sm-3 control-label">Notas</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3"></textarea>
							</div>		

						

						</div>


</div>

</div>





















		



<div class="linea col-md-12"></div>


	
<div class="row">
		<div class="col-sm-12 text-center">
				<div class="form-group">
						
							<button type="submit" class="btn btn-primary">Guardar como borrador</button>
							<button type="submit" class="btn btn-danger">Guardar Factura</button>
						
				</div>
		</div>
</div>


						
					



					
				</form>




			</div>
		</div>
	</div>

</div>



<script src="js/paginas.js"></script>
