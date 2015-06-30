<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */

	public function rules()
	{
		// rememberFormLocation(Request::get('department_id'), Request::get('province_id'), Request::get('district_id'));

		// dd( session('location.province.0') );

		$id = url_alias() == 'users.profile.update' ? auth()->user()->id : $this->segment(2);

		$validations = [
            'name'         		=> array('required', 'max:30', 'regex:/^[a-zA-Z ñÑÁÉÍÓÚáéíóúü]+$/'),
            'lastname'        	=> array('required', 'max:20', 'regex:/^[a-zA-Z ñÑÁÉÍÓÚáéíóúü]+$/'),
            'phone'     		=> 'required|max:15',
            'office_phone'     	=> 'max:20',
            'email'     		=> 'required|email|unique:users,email,' . $id,
            'dni'     			=> array('required', 'size:8', 'regex:/^[0-9]+$/'),
            'address'     		=> 'required|max:100',
            'department_id'		=> 'required|exists:departments,id',
            'province_id'		=> 'required|exists:provinces,id',
            'district_id'		=> 'required|exists:districts,id',
            
            'country'     		=> 'required|max:20',
            'ruc'     			=> array('required', 'max:20', 'regex:/^[0-9]+$/'),
            'company_name'     	=> 'required|max:50',
            'sol_key'     		=> 'required|max:50',
            'bn_account'     	=> array('required', 'max:30', 'regex:/^[0-9]+$/'),
        ];

        if ( is_admin() ) {
        	return ['level_id'=> 'required|exists:levels,id',] + $validations;
        }else{
        	return $validations;
        }


	}

}
