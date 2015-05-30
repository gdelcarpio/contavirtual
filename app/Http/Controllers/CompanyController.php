<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user       = \Auth::user()->id;	
		$type		= \Input::get('type');		
		$rows  	    = \Input::get('rows', 5);

		$column 	= \Input::get('column', 'id'); //columna a ordenr
		$direction  = \Input::get('direction', 'desc'); //tipo de orden

		$q  = trim(\Input::get('q') != "" ) ? trim(\Input::get('q')) : '';

		$searchTerms = $q != '' ? explode(' ', $q) : '';

		$companies   = Company::where('user_id',$user)
							   ->sortBy(compact('column', 'direction'))
							   
		                       ->where(function($query) use ($searchTerms) {
					                if( $searchTerms != '' )
					                {
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

		$rows = [
					5  => 5,
					10 => 10,
					20 => 20,
					30 => 30,
					40 => 40
				];

		return view('companies.index', compact('companies','rows','column','direction','type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'hola';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function client_ajax($id){
		$company_ajax = Company::findOrFail($id);
        return view('invoices.partials.company', compact('company_ajax'));
	}

}
