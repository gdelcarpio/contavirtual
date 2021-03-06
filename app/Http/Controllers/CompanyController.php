<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;

/* Agregado */
use App\Department;
use App\Province;
use App\District;
use Illuminate\Http\Request;

use App\Http\Requests\CompanyRequest;


class CompanyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$user       = \Auth::user()->id;
		$type		= \Input::get('type');
		$rows  	    = \Input::get('rows', 10);
		$column 	= \Input::get('column', 'id');
		$direction  = \Input::get('direction', 'desc');

		$role  		= \Input::get('role', '');
		$param 		= $this->getRoleId($role);

		$q  = trim(\Input::get('q') != "" ) ? trim(\Input::get('q')) : '';
		$searchTerms = $q != '' ? explode(' ', $q) : '';

		$companies = auth()->user()->companies()
						->where(function($query) use ($param) {
			                if( $param['id'] > 0 ){
			              		$query->where($param['name'], $param['id']);
			                }
			            })
					   ->sortBy(compact('column', 'direction'))
                       ->where(function($query) use ($searchTerms) {
			                if( $searchTerms != '' ){
			                    foreach($searchTerms as $term){
			              			$query->orWhere('company_name', 'LIKE', '%'. $term .'%');
			                     	$query->orWhere('ruc', 'LIKE', '%'. $term .'%');
			                     	$query->orWhere('name', 'LIKE', '%'. $term .'%');
			                     	$query->orWhere('email', 'LIKE', '%'. $term .'%');
			                     	$query->orWhere('phone', 'LIKE', '%'. $term .'%');
			                    }
			                }
			            })
                       ->paginate($rows);
		
		$countTotal 	= auth()->user()->companies()->count();
		$countClient 	= auth()->user()->companies()->whereClient(1)->count();
		$countProvider 	= auth()->user()->companies()->whereProvider(1)->count();

		$rows = getRowsNumber();
				
		$report = [
        	'cliente'  	=> $countClient,
        	'proveedor'	=> $countProvider,
        	'total'		=> $countTotal,
        ];

		return view('companies.index', compact('companies','rows','column','direction','type', 'report'));
	}

	public function getRoleId($role)
	{
		switch ($role) {
			case 'client': $param['id'] = 1; $param['name'] = 'client'; break;
			case 'provider': $param['id'] = 1; $param['name'] = 'provider'; break;
			
			default: $param['id'] = 0; break;
		}

		return $param;	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{		
		$options = $this->getComboBoxOptions();
		return view('companies.create', compact('options'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CompanyRequest $request)
	{
		return $this->newCompany(-1, $request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$company = Company::findORFail($id);
		$options = $this->getComboBoxOptions();
		return view('companies.edit', compact('company','options'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CompanyRequest $request)
	{
		return $this->newCompany($id, $request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{	
		$company = Company::findORFail($id);
		$company->delete();
		$message = $company->company_name.' fue eliminado de nuestros registros';
		
		if($request->ajax()){
			return response()->json([
				'id' => $id,
				'message' => $message
			]);
		}
		\Session::flash('message', $message);
		return redirect()->route('companies.index');
	}

	public function getComboBoxOptions()
    {
        $departments 	= Department::lists('name','id');
        $departments 	= array(''=>'') + $departments;

        $provinces 		= Province::lists('name','id');
        $provinces 		= array(''=>'') + $provinces;

        $districts 		= District::lists('name','id');
        $districts 		= array(''=>'') + $districts;

    	
        $options 	= 	[
        				'departments'  	=> $departments,
        				'provinces' 	=> $provinces,
        				'districts' 	=> $districts
        				];

        return $options;
    }

    private function newCompany($id ,$inputs){
		$clienteOK = $inputs['client'] == 1;
		$clienteOK ? $inputs['provider']=0 : $inputs['provider']=1;

		if($id > 0){
			$company = Company::findORFail($id);
		}else{
			$company = new Company;
		}

		$company->fill($inputs);
		$company->save();
		return \Redirect::route('companies.index');
	}

	public function ajaxCompany($company_id)
	{
		$company = Company::findOrFail($company_id);

		return view('invoices.partials.company', compact('company'));
	}

}
