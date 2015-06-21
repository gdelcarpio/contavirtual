<div class="col-md-6">
	<ul class="nav nav-pills" role="tablist">
		<li role="presentation" class="active"><a href="{{route('companies.index')}}">Todos <span class="badge">{{$report['cliente']+$report['proveedor']}}</span></a></li>
		<li role="presentation">{!! filter_by(Route::currentRouteName(),"Clientes",1) !!}</li>
		<li role="presentation"><a href="#">Clientes <span class="badge">{{$report['cliente']}}</span></a></li>
		<li role="presentation"><a href="#">Proveedores <span class="badge">{{$report['proveedor']}}</span></a></li>
	</ul>
</div>