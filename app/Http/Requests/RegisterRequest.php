<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	public function authorize()
	{
		return true;
		// return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */

	public function rules()
	{
		return [
	            'name'         			=> array('required', 'max:30', 'regex:/^[a-zA-Z ñÑÁÉÍÓÚáéíóúü]+$/'),
	            'lastname'        		=> array('required', 'max:20', 'regex:/^[a-zA-Z ñÑÁÉÍÓÚáéíóúü]+$/'),
	            'email'     			=> 'email|unique:users,email',
	            'password' 				=> 'required|confirmed|min:6',
				'password_confirmation' => 'required',
            ];

	}

}
