<tr>
	<th>
		<i class="fa fa-{{ show_sort_icon('company_name', $column, $direction) }}"></i>
		{!! sort_model_by('company_name', 'Empresa', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('ruc', $column, $direction) }}"></i>
          {!! sort_model_by('ruc', 'RUC', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('name', $column, $direction) }}"></i>
        {!! sort_model_by('name', 'Nombre de', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('email', $column, $direction) }}"></i>
    	{!! sort_model_by('email', 'Correo Electrónico', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('phone', $column, $direction) }}"></i>
		{!! sort_model_by('phone', 'Teléfono', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('provider', $column, $direction) }}"></i>
      	{!! sort_model_by('provider', 'Proveedor', Route::currentRouteName()) !!}
	</th>
	<th>
		<i class="fa fa-{{ show_sort_icon('client', $column, $direction) }}"></i>
   		{!! sort_model_by('client', 'Cliente', Route::currentRouteName()) !!}
	</th>
	<th>Acciones</th>							
</tr>