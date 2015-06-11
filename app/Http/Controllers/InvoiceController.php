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

class InvoiceController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

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
		$options = $this->getComboBoxOptions();

		$items 	 = \Cart::items();

		return view('invoices.create', compact('options', 'items'));        
	}

	public function store(InvoiceRequest $request)
	{
		$request['invoice_category_id'] =  '1';

		$invoice = Invoice::create($request->except('account_id', 'product_id', 'quantity'));

		foreach (\Cart::items() as $pos => $item) {
			$attach[$pos]['product_id'] = $item->id;
			$attach[$pos]['quantity'] 	= $item->quantity;
			$attach[$pos]['old_price'] 	= $item->price;
		}

		$invoice->products()->attach($attach);

		$invoice->subtotal 	= \Cart::getTotal();
		$invoice->total 	= \Cart::getTotal() * ( 1 + ( $invoice->igv / 100 ) );

		$invoice->update();

		\Cart::clear();

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
		$options = $this->getComboBoxOptions();

        \Cart::clear();

		$invoice = \Auth::user()->invoices->find($id);

		if ( ! $invoice ) {
			\Flash::warning('No tiene los permisos necesarios para acceder a esta factura');
			return \Redirect::route('invoices.index');
		}

		foreach ($invoice->products as $item) {

			\Cart::add([
			    'id'       => $item->id,
			    'name'     => $item->name,
			    'quantity' => $item->pivot->quantity,
			    'price'    => $item->pivot->old_price
			]);
		}

		$items = \Cart::items();

		return view('invoices.edit', compact('options', 'items', 'invoice'));        
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

		foreach (\Cart::items() as $pos => $item) {
			$sync[$pos]['product_id'] 	= $item->id;
			$sync[$pos]['quantity'] 	= $item->quantity;
			$sync[$pos]['old_price'] 	= $item->price;
		}

		$invoice->products()->sync($sync);

		$invoice->subtotal 	= \Cart::getTotal();
		$invoice->total 	= \Cart::getTotal() * ( 1 + ( $invoice->igv / 100 ) );

		$invoice->update();

		\Cart::clear();

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

    public function getComboBoxOptions()
    {
		$user 		= \Auth::user();

        $companies 	= $user->companies->where('client', 1)->lists('ruc','id');
        $companies 	= array(''=>'') + $companies;

        $products 	= $user->products->where('active', 1)->lists('name','id');
        $products 	= array(''=>'') + $products;

    	$types 		= Type::where('id', '<', 3)->lists('name','id');
        $types 		= array(''=>'') + $types;

        $accounts 	= Account::lists('name','id');
        $accounts 	= array(''=>'') + $accounts;

        $options 	= [
        				'types'  	=> $types,
        				'accounts' 	=> $accounts,
        				'companies' => $companies,
        				'products' 	=> $products,
        			];

        return $options;
    }

}
