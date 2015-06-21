<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class CompanyRequest extends Request {

	private $route;

	public function __construct(Route $route){
		$this->route = $route;
	}
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
		return [
			'company_name'		=>'required',
			'ruc'				=>'required|digits:11',
			'tax_address'		=>'required',
			'name'				=>'required',
			'lastname'			=> 'required',
			'relationship'		=> 'required',
			'email'				=> 'required|unique:companies,email,'. $this->route->getParameter('companies'),
			'office_phone'		=> 'required|numeric',
			'phone'				=> 'required|numeric',
			'web'				=> 'required|active_url',
			'country'			=> 'required',
			'observations'		=> 'required',
			'client'			=> 'required|boolean',
			'provider'			=> 'required|boolean',
		];
	}

}
