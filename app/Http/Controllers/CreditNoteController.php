<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreditNoteRequest;

use App\CreditNote;

class CreditNoteController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rows  		= \Input::get('rows', 10);
		$column 	= \Input::get('column', 'id');
		$direction  = \Input::get('direction', 'desc');
		$from  		= \Input::get('from', '');
		$to  		= \Input::get('to', '');

		$q  = trim(\Input::get('q')) != "" ? trim(\Input::get('q')) : '';

		$searchTerms = $q != '' ? explode(' ', $q) : '';

        $credit_notes = auth()->user()->credit_notes()
       					->with(['invoice'])		
						// ->join('invoices', 'invoices.id', '=', 'invoice_id')
						->join('invoice_types', 'invoice_types.id', '=', 'invoices.invoice_type_id')
						->join('companies', 'companies.id', '=', 'invoices.company_id')
						->select('credit_notes.*','companies.company_name as company', 'companies.ruc as ruc', 'invoice_types.name as invoice_type_name', 'invoices.serial as serial', 'invoices.number as number')
						->sortBy(compact('column', 'direction'))
						->dateBetween(compact('from', 'to'))
	        			// ->where(function($query) use ($searchTerms) {
			         //        if( $searchTerms != '' )
			         //        {
			         //            foreach($searchTerms as $term){
			         //            	$query->orWhere('companies.ruc', 'LIKE', '%'. $term .'%');
			         //            	$query->orWhere('total', 'LIKE', '%'. $term .'%');
			         //            }

			         //        }
			         //    })
	        			->paginate($rows);

		$rows = getRowsNumber();

        return view('credit-notes.index', compact('credit_notes','rows', 'column', 'direction'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$companies = auth()->user()->companies()->lists('company_name', 'id');
		$companies = array(''=>'') + $companies;

		return view('credit-notes.create', compact('companies'));    
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreditNoteRequest $request)
	{
		$invoice = auth()->user()->invoices()->find($request['invoice_id']);

		$invoice->credit_notes()->create($request->except('companies', 'invoice_id'));

		flash()->success('Nota de Crédito agregada satisfactoriamente.');

		return redirect()->route('credit-notes.index');
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
		$credit_note = auth()->user()->credit_notes()->find($id);

		$companies = auth()->user()->companies()->lists('company_name', 'id');
		$companies = array(''=>'') + $companies;

		return view('credit-notes.edit', compact('credit_note', 'companies'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreditNoteRequest $request)
	{
		$credit_note = auth()->user()->credit_notes()->find($id);

		$credit_note->update($request->except('companies'));

		flash()->success('Nota de Crédito actualizada satisfactoriamente.');

		return redirect()->route('credit-notes.index');
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

	public function ajaxInvoices($id)
	{
		// $invoices = auth()->user()->invoices()->where('company_id', $id)->lists('fullInvoice','id');

		$invoices = auth()->user()->invoices()->where('company_id', $id)->get();
		$invoices = $invoices->lists('full_invoice', 'id');
        $invoices = array('' => '') + $invoices;

        return view('credit-notes.partials.form-invoices', compact('invoices'));
	}

}
