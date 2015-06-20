<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Province;
use App\District;

class AssistantController extends Controller {

	protected $request;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Request $request){
		$this->request = $request;
	}

	public function getDepartament()
	{
		$idCompare = $this->request->get('id');
		return $departments = $this->getEntity('department_id', $idCompare, "Province");
	}

	public function getProvince()
	{
		$idCompare = $this->request->get('id');
		return $provinces = $this->getEntity('province_id', $idCompare, "District");
	}

	private function getEntity($id, $idCompare, $entity){
		$model 	= "App" . "\\" . $entity;
		return $list = $model::where($id,'=',$idCompare)
								->lists('name', 'id');
	}
	

	

}
