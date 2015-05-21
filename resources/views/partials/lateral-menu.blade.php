<ul class="nav main-menu">
			
	<li>
		<a href="{{ route('home') }}" class="active ajax-link">
			<i class="fa fa-dashboard"></i>
			<span class="hidden-xs">Panel de control</span>
		</a>
	</li>

	@if( is_admin() )

	<li class="menu-li">
		<a href="{{ route('users.index') }}" class="ajax-link">
			<i class="fa fa-users"></i>
			<span class="hidden-xs">Usuarios</span>
		</a>
		<a href="{{ route('users.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
	</li>
	
	
	@endif

	<li class="menu-li">
		<a href="{{ route('companies') }}" class="ajax-link">
			<i class="fa fa-users"></i>
			<span class="hidden-xs">Empresas</span>
		</a>
		<a href="#" class="agregar"><i class="fa fa-plus"></i></a>
		
	</li>

	<li class="menu-li">
		<a href="{{ route('products') }}" class="ajax-link">
			<i class="fa fa-list-ul"></i>
			<span class="hidden-xs">Productos / servicios</span>
		</a>
		<a href="#" class="agregar"><i class="fa fa-plus"></i></a>
	</li>

	<hr style="margin:0px">

	<li class="dropdown">
		<a href="#" class="dropdown-toggle">
			<i class="fa fa-shopping-cart"></i>
			<span class="hidden-xs">Ventas</span>
		</a>

		<ul class="dropdown-menu">
			<li class="menu-li"><a class="ajax-link" href="{{ route('invoices.index') }}">Facturas</a>
				<a href="{{ route('invoices.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
			</li>
			<li class="menu-li"><a class="ajax-link" href="{{ route('tickets') }}">Boletas</a>
				<a href="#" class="agregar"><i class="fa fa-plus"></i></a>
			</li>
			<li class="menu-li"><a class="ajax-link" href="{{ route('credit_notes') }}">Notas de crédito</a>
				<a href="#" class="agregar"><i class="fa fa-plus"></i></a>
			</li>
	<!-- 		<li><a class="ajax-link" href="ajax/charts_flot.html">Pagos Recibidos</a></li>
			<li><a class="ajax-link" href="ajax/charts_xcharts.html">Facturas recurrentes</a></li>-->
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle">
			<i class="fa fa-tag"></i>
			 <span class="hidden-xs">Compras</span>
		</a>
		<ul class="dropdown-menu">
			<li><a class="ajax-link" href="{{ route('expenses') }}">Gastos</a>
			<a href="#" class="agregar"><i class="fa fa-plus"></i></a>
			</li>								
		</ul>
	</li>
	
</ul>