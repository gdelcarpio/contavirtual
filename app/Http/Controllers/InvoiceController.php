<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\InvoiceRequest;

use App\Invoice;
use App\Account;
use App\InvoiceType as Type;
use App\Subaccount;
use App\Company;
use App\Product;
use App\User;
use Anam\Phpcart\Cart;

class InvoiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *991118G
	 * @return Response
	 */
	public function index()
    {
        $invoices = Invoice::all();

		$rows = [
			10 => 10,
			20 => 20,
			30 => 30,
			40 => 40
		];

        return view('invoices.index', compact('invoices', 'rows'));
    }


	public function create()
	{
		$user = \Auth::user();

        $types = Type::where('id', '<',3)->lists('name','id');
        $types = array(''=>'') + $types;

        $accounts = Account::lists('name','id');
        $accounts = array(''=>'') + $accounts;

        $companies = $user->companies->where('client', 1)->lists('ruc','id');
        $companies = array(''=>'') + $companies;

        $products = $user->products->where('active', 1)->lists('name','id');
        $products = array(''=>'') + $products;

        $cart = new Cart();

		$items = $cart->items();

		return view('invoices.create', compact('accounts','companies','products', 'items', 'types'));        
	}


	public function store(InvoiceRequest $request)
	{
		$request['invoice_category_id'] =  '1';

		$invoice = Invoice::create($request->except('account_id', 'product_id', 'quantity'));

		$cart = new Cart();

		$products_id = $cart->items()->lists('id');

		$invoice->products()->attach($products_id);

		$cart->clear();

		\Flash::success('Factura agregada satisfactoriamente.');

		return \Redirect::route('invoices.index');
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

		$user = \Auth::user();

        $accounts = Account::lists('name','id');
        $accounts = array(''=>'') + $accounts;

        $companies = $user->companies->where('client', 1)->lists('ruc','id');
        $companies = array(''=>'') + $companies;

        $products = $user->products->where('active', 1)->lists('name','id');
        $products = array(''=>'') + $products;

        $cart = new Cart();

        $cart->clear();

		$invoice = $user->invoices->find($id);

		if ( ! $invoice ) {
			\Flash::warning('No tiene los permisos necesarios para acceder a esta factura');
			return \Redirect::route('invoices.index');
		}

		foreach ($invoice->products as $item) {

			$cart->add([
			    'id'       => $item->id,
			    'name'     => $item->name,
			    'quantity' => 1,
			    'price'    => $item->price
			]);
		}

		$items = $cart->items();

		return view('invoices.edit', compact('accounts','companies','products', 'items', 'invoice'));        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, InvoiceRequest $request)
	{
		$invoice = Invoice::findOrFail($id);

		$invoice->update($request->except('account_id', 'product_id', 'quantity'));

		$cart = new Cart();

		$products_id = $cart->items()->lists('id');

		$invoice->products()->sync($products_id);

		$cart->clear();

		\Flash::success('Factura actualizada satisfactoriamente.');

		return \Redirect::route('invoices.index');
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

     public function ajaxSubaccounts($id)
     {
        $subaccounts = Subaccount::where('account_id',$id)->lists('name','id');
        $subaccounts = array('' => '') + $subaccounts;
        return view('invoices.partials.form-subaccount', compact('subaccounts'));
            
    }

     public function ajaxAccounts($subaccount_id)
     {
     	$subaccount = Subaccount::findOrFail($subaccount_id);

     	return $subaccount->account_id;            
    }

}
