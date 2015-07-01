<div class="col-md-6">
	<ul class="nav nav-pills" role="tablist">
		<li class="presentation {{ active_link( Input::get('role'), '' ) }}"><a href="{{route('companies.index')}}">Todos <span class="badge">{{ $report['total'] }}</span></a></li>
		<li class="presentation {{ active_link( Input::get('role'), 'client' ) }}">{!! role_filter('client', "Clientes", url_alias()) !!}<span class="badge">{{ $report['cliente'] }}</span></li>
		<li class="presentation {{ active_link( Input::get('role'), 'provider' ) }}">{!! role_filter('provider', "Proveedores", url_alias()) !!}<span class="badge">{{ $report['proveedor'] }}</span></li>
	</ul>
</div>