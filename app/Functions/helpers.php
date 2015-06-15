<?php

function sort_model_by($column, $body, $url)
{
	$q 			= Request::get('q');
	$direction 	= Request::get('direction') == 'asc' ? 'desc' : 'asc' ;
	$rows 		= Request::get('rows');
	$page 		= Request::get('page');

	$from 		= Request::get('from');
	$to 		= Request::get('to');

	return link_to_route($url, $body, ['q' => $q,'column' => $column, 'direction' => $direction, 'rows' => $rows, 'page' => $page, 'from' => $from, 'to' => $to ]);
}

function filter_by($url, $title, $type)
{
	return link_to_route($url, $title, ['type' => $type]);
}

function show_sort_icon($sortName, $sortRequest, $direction)
{
	if ($sortName == $sortRequest) {
		$sortIcon = $direction == 'asc' ? 'sort-asc' : 'sort-desc' ;
	}else{
		$sortIcon = 'sort';
	}

	return $sortIcon;
}

function show_role_icon($role_id)
{
	switch ($role_id) {
		case 1:	$icon = 'fa-eye'; break;
		case 2:	$icon = 'fa-user'; break;
		case 3:	$icon = 'fa-user-plus'; break;
		case 4:	$icon = 'fa-user-secret'; break;
		
		default: $icon = ''; break;
	}

	return $icon;
}

function limpiarCaracteresEspeciales($string)
{
	$string = htmlentities($string);
	$string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);

	return $string;
}

function limpiarEspacios($string)
{
	$string = str_replace(' ', '', $string);
	
	return $string;
}

function link_selected($route, $link)
{

	switch ($link) {
		case 'Pagos':
			$array = ['payments.index', 'payments.create', 'payments.edit', 'payments.search', 'payments.show', 'payments.statistics'];
			break;
		case 'Usuarios':
			$array = ['users.index', 'users.create', 'users.edit', 'users.search', 'users.show', 'users.payments.index', 'users.payments.create'];
			break;
		case 'Panel':
			$array = ['home', 'contact'];
			break;
		case 'Login':
			$array = ['login'];
			break;
		case 'Perfil':
			$array = ['users.profile', 'users.password.edit', 'users.payments'];
			break;

		default:
			$array = [''];
			break;
	}

	if( in_array($route, $array) )
	{
		return 'active';
	}

	return '';

}

function rememberFormLocation($department, $province, $district)
{
	Session::forget('location');

	Session::push('location.department', $department);
	Session::push('location.province', $province);
	Session::push('location.district', $district);

	return true;
}

function url_alias()
{
	return Route::currentRouteName();
}

function getRowsNumber()
{
	$rows = [
				'' => '#',
				5  => 5,
				10 => 10,
				20 => 20,
				30 => 30,
				40 => 40
			];

	return $rows;
}