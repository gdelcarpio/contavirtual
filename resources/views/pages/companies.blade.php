@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">LISTA DE EMPRESAS</a></li>
			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
			<ul class="nav nav-pills" role="tablist">
		  <li role="presentation" class="active"><a href="#">Todos <span class="badge">42</span></a></li>
		  <li role="presentation"><a href="#">Clientes <span class="badge">30</span></a></li>
		  <li role="presentation"><a href="#">Proveedores <span class="badge">12</span></a></li>
		</ul>

		</div>
		<div class="col-md-6 text-right">
					
			<div class="btn-group">
			  <a href="paginas/empresa-crear.html"  class="btn btn-danger crear_documento">
			    <i class="fa fa-plus"></i> Registrar Empresa
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
							
							<th><a href="#"><i class="fa fa-sort"></i> Nombre de empresa</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> RUC</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Nombre de contacto</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Correo electrónico</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Teléfono</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> proveedor</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> cliente</a></th>
							<th>Acciones</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>no</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>si</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>no</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>no</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						<tr>
							<td>Inventiva Click</td>
							<td>2021548721</td>
							<td>Pedrito Suarez</td>
							<td>pedro@inventivaclick.com</td>
							<td>969568458</td>
							<td>si</td>
							<td>si</td>
							<td><a href="#">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>

		<!-- paginado inferior -->

	</div>
    <div class="col-md-6">
	    Mostrando 23 de 1520 resultados</div>
		<div class="col-md-6 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               


		</div>

</div>
@endsection