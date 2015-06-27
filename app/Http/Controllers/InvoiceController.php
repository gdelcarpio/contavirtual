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
	 *
	 * @return Response
	 */
	public function index()
    {
		$page = $this->getPageInfo(url_alias());

		$rows  		= \Input::get('rows', 10);
		$column 	= \Input::get('column', 'id');
		$direction  = \Input::get('direction', 'desc');
		$from  		= \Input::get('from', '');
		$to  		= \Input::get('to', '');

		$q  = trim(\Input::get('q')) != "" ? trim(\Input::get('q')) : '';

		$searchTerms = $q != '' ? explode(' ', $q) : '';

        $invoices = auth()->user()->invoices()
	        			->where('invoice_category_id', $page['id'])
       					->with(['invoiceType', 'company', 'subaccount'])		
						->join('invoice_types', 'invoice_types.id', '=', 'invoice_type_id')
						->leftJoin('companies', 'companies.id', '=', 'company_id')
						->select('invoices.*','companies.company_name as company', 'companies.ruc as ruc', 'invoice_types.name as invoice')
						->sortBy(compact('column', 'direction'))
						->dateBetween(compact('from', 'to'))
	        			->where(function($query) use ($searchTerms) {
			                if( $searchTerms != '' )
			                {
			                    foreach($searchTerms as $term){
			                    	$query->orWhere('companies.company_name', 'LIKE', '%'. $term .'%');
			                    	$query->orWhere('companies.ruc', 'LIKE', '%'. $term .'%');
			                    	$query->orWhere('serial', 'LIKE', '%'. $term .'%');
			                    	$query->orWhere('number', 'LIKE', '%'. $term .'%');
			                    }

			                }
			            })
	        			->paginate($rows);

		$rows = getRowsNumber();

        return view('invoices.index', compact('invoices', 'rows', 'page', 'column', 'direction'));
    }

	public function create()
	{
		$options = $this->getComboBoxOptions();

		$page 	 = $this->getPageInfo(url_alias());

		$items 	 = \Cart::items();

		return view('invoices.create', compact('options', 'items', 'page'));        
	}

	public function store(InvoiceRequest $request)
	{
		$page = $this->getPageInfo(url_alias());

		$request['invoice_category_id'] =  $page['id'];

		$invoice = auth()->user()->invoices()->create($request->except('account_id', 'product_id', 'quantity'));

		if ($page['title_en'] == 'sales') {

			foreach (\Cart::items() as $pos => $item) {
				$attach[$pos]['product_id'] = $item->id;
				$attach[$pos]['quantity'] 	= $item->quantity;
				$attach[$pos]['price'] 	= $item->price;
			}

			$invoice->products()->attach($attach);

			$invoice->subtotal 	= \Cart::getTotal();
			$invoice->total 	= \Cart::getTotal() * ( 1 + ( $invoice->igv / 100 ) );
			
		}else{
			$invoice->total 	= $invoice->subtotal * ( 1 + ( $invoice->igv / 100 ) );
		}

		$invoice->update();

		\Cart::clear();

		\Flash::success('Comprobante agregado satisfactoriamente.');

		return redirect()->route($page['index']);
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
		$page  = $this->getPageInfo(url_alias());
		
		$options = $this->getComboBoxOptions();

        \Cart::clear();

		$invoice = auth()->user()->invoices->find($id);

		if ( ! $invoice ) {
			\Flash::warning('No tiene los permisos necesarios para acceder a este comprobante de pago');
			return redirect()->route('invoices.index');
		}

		if ($page['title_en'] == 'sales') {

			foreach ($invoice->products as $item) {

				\Cart::add([
				    'id'       => $item->id,
				    'name'     => $item->name,
				    'quantity' => $item->pivot->quantity,
				    'price'    => $item->pivot->price
				]);
			}

			$items = \Cart::items();
		}else{

			$items = [];
		
		}

		return view('invoices.edit', compact('options', 'items', 'invoice', 'page'));        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, InvoiceRequest $request)
	{
		$page  = $this->getPageInfo(url_alias());
		
		$invoice = Invoice::findOrFail($id);

		$invoice->update($request->except('account_id', 'product_id', 'quantity'));


		if ($page['title_en'] == 'sales') {

			foreach (\Cart::items() as $pos => $item) {
				$sync[$pos]['product_id'] 	= $item->id;
				$sync[$pos]['quantity'] 	= $item->quantity;
				$sync[$pos]['price'] 	= $item->price;
			}

			$invoice->products()->sync($sync);

			$invoice->subtotal 	= \Cart::getTotal();
			$invoice->total 	= \Cart::getTotal() * ( 1 + ( $invoice->igv / 100 ) );
		}

		$invoice->update();

		\Cart::clear();

		\Flash::success('Comprobante actualizado satisfactoriamente.');

		return redirect()->route($page['index']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$invoice = auth()->user()->invoices->find($id);

		$invoice->products()->detach();
		$invoice->delete();

		\Flash::success('Se eliminó el comprobante #' . $id . ' correctamente.');
		return view('message');
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
		$user 		= auth()->user();

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

    public function getPageInfo($url_alias)
    {
		switch ($url_alias) {

			case 'invoices.sales.create': case 'invoices.sales.edit': case 'invoices.sales.index': case 'invoices.sales.store': case 'invoices.sales.update': case 'invoices.sales.excel':

				$page = [
						'id'		=> 1,
						'title' 	=> 'ventas',
						'title_en' 	=> 'sales',
						'create' 	=> 'invoices.sales.create',
						'store' 	=> 'invoices.sales.store',
						'update' 	=> 'invoices.sales.update',
						'edit' 		=> 'invoices.sales.edit',
						'index' 	=> 'invoices.sales.index',
						'show' 		=> 'invoices.sales.show',
						'destroy' 	=> 'invoices.sales.destroy',
						'excel' 	=> 'invoices.sales.excel',
					];

				break;

			case 'invoices.expenses.create': case 'invoices.expenses.edit':	case 'invoices.expenses.index': case 'invoices.expenses.store': case 'invoices.expenses.update': case 'invoices.expenses.excel':
				
				$page = [
						'id'		=> 2,
						'title' 	=> 'compras',
						'title_en' 	=> 'expenses',
						'create' 	=> 'invoices.expenses.create',
						'store' 	=> 'invoices.expenses.store',
						'update' 	=> 'invoices.expenses.update',
						'edit' 		=> 'invoices.expenses.edit',
						'index' 	=> 'invoices.expenses.index',
						'show' 		=> 'invoices.expenses.show',
						'destroy' 	=> 'invoices.expenses.destroy',
						'excel' 	=> 'invoices.expenses.excel',
					];

				break;
			
			default: $page = []; break;
		}

		return $page;
    }

    public function exportToExcel()
    {
		$page 	 = $this->getPageInfo(url_alias());

    	$invoices = auth()->user()->invoices()->where('invoice_category_id', $page['id'])->get();

		\Excel::create('CONTAVIRTUAL | ' . \Str::title($page['title']), function($excel) use ($invoices, $page){

			$excel->setCreator('CONTAVIRTUAL')
            	  ->setCompany('CONTAVIRTUAL');

		    $excel->sheet('Lista de ' . $page['title'], function($sheet) use ($invoices){

		        $sheet->loadView('invoices.excel')->with('invoices', $invoices);
		        $sheet->freezeFirstRow();

		    });

		})->download('xls');
    }

}
