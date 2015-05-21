<?php

function sort_model_by($column, $body, $url)
{
	$direction 	= Request::get('direction') == 'asc' ? 'desc' : 'asc' ;

	$option 		= Request::get('option');
	$q 					= Request::get('q');

	return link_to_route($url, $body, ['column' => $column, 'direction' => $direction, 'option' => $option, 'q' => $q]);
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

function link_selected($url, $link)
{

	switch ($link) {
		case 'Fichas':
			$array = ['files.index', 'files.create', 'files.edit', 'files.search', 'files.show', 'files.statistics'];
			break;
		case 'Usuarios':
			$array = ['users.index', 'users.create', 'users.edit', 'users.search', 'users.show'];
			break;
		case 'Sedes':
			$array = ['headquarters.index', 'headquarters.create', 'headquarters.edit', 'headquarters.search', 'headquarters.show'];
			break;
		case 'Midis':
			$array = ['index', 'contact'];
			break;
		case 'Login':
			$array = ['login'];
			break;
		case 'Perfil':
			$array = ['users.profile', 'users.change-password', 'users.history'];
			break;

		default:
			$array = [''];
			break;
	}

	if( in_array($url, $array) )
	{

		return 'selected-link';

	}else{

		return '';

	}

}

function rememberFormLocation($department, $province, $district)
{
	Session::forget('location');

	Session::push('location.department', $department);
	Session::push('location.province', $province);
	Session::push('location.district', $district);

	return true;
}