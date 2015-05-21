<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Invoice;
use App\Account;
use App\Subaccount;
use App\Company;
use Illuminate\Http\Request;

class InvoiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *991118G
	 * @return Response
	 */
	public function index()
    {
        $invoices = Invoice::All();
        return view('pages.invoices', compact('invoices'));
    }


	public function create()
	{
        $categoria = Account::All();
        $subcategoria = Subaccount::All();
        $companies = Company::select('ruc','id')->where('client','=','1')->get();

		return view('pages.invoice_create', compact('categoria','subcategoria','companies'));
        //dd($companies);
	}


	public function store()
	{
		//
	}


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


    // public function subcategoria($id){
    //     if(Request::ajax()){
    //         $subcat = \DB::table('subaccount')->select('id','name')->where('account_id','=','id')->get();
    //         return Response::json($subcat);
    //     }
    // }

}
