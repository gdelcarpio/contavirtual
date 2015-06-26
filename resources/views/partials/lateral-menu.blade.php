<ul class="nav main-menu">
			
	<li>
		<a href="{{ route('home') }}" class="{{ link_selected(url_alias(), 'Panel') }}">
			<i class="fa fa-dashboard"></i>
			<span class="hidden-xs">Panel de control</span>
		</a>
	</li>

	@if( is_admin() )

		<li class="menu-li">
			<a href="{{ route('users.index') }}" class="{{ link_selected(url_alias(), 'Usuarios') }}">
				<i class="fa fa-users"></i>
				<span class="hidden-xs">Usuarios</span>
			</a>
			<a href="{{ route('users.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
		</li>

		<li class="menu-li">
			<a href="{{ route('payments.index') }}" class="{{ link_selected(url_alias(), 'Pagos') }}">
				<i class="fa fa-credit-card"></i>
				<span class="hidden-xs">Pagos</span>
			</a>
			<a href="{{ route('payments.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
		</li>
		
	@endif

	<li class="menu-li">
		<a href="{{ route('companies.index') }}" class="{{ link_selected(url_alias(), 'Empresas') }}">
			<i class="fa fa-building"></i>
			<span class="hidden-xs">Empresas</span>
		</a>
		<a href="{{ route('companies.create')}}" class="agregar"><i class="fa fa-plus"></i></a>
		
	</li>

	<li class="menu-li">
		<a href="{{ route('products.index') }}" class="{{ link_selected(url_alias(), 'Productos') }}">
			<i class="fa fa-list-ul"></i>
			<span class="hidden-xs">Productos / servicios</span>
		</a>
		<a href="{{ route('products.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
	</li>

	<hr style="margin:0px">

	<li class="dropdown">
		<a href="#" class="dropdown-toggle">
			<i class="fa fa-shopping-cart"></i>
			<span class="hidden-xs">Ventas</span>
		</a>

		<ul class="dropdown-menu">
			<li class="menu-li"><a class="ajax-link" href="{{ route('invoices.sales.index') }}">Facturas / Boletas</a>
				<a href="{{ route('invoices.sales.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
			</li>
			<li class="menu-li"><a class="ajax-link" href="{{ route('credit-notes.index') }}">Notas de crédito</a>
				<a href="{{ route('credit-notes.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
			</li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle">
			<i class="fa fa-tag"></i>
			 <span class="hidden-xs">Compras</span>
		</a>
		<ul class="dropdown-menu">
			<li><a class="ajax-link" href="{{ route('invoices.expenses.index') }}">Gastos</a>
			<a href="{{ route('invoices.expenses.create') }}" class="agregar"><i class="fa fa-plus"></i></a>
			</li>								
		</ul>
	</li>
	
</ul>