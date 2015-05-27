<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller {

	
	public function index(Requests $request)
	{

		$search     = $request->get('name');

		$user       = \Auth::user()->id;		
		$rows  	    = \Input::get('rows', 1);
		$products   = Product::where('user_id',$user)->paginate($rows);
		$column 	= \Input::get('column', 'id');
		$direction  = \Input::get('direction', 'desc');

		$rows = [
					10 => 10,
					20 => 20,
					30 => 30,
					40 => 40
				];

		return view('products.index', compact('products','rows','column','direction'));
	}


	public function create()
	{
		return view('products.create');
	}


	public function store(ProductRequest $request)
	{
		$product = new Product($request->all());
		$product->user_id = \Auth::user()->id;
		$product->save();
		//\Flash::success('Se agregó elproducto correctamente.');
		return redirect()->route('products.index');
	}


	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('products.edit', compact('product'));
	}


	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);
		$product->update($request->all());

		return redirect()->back();
	}


	public function destroy($id)
	{
		//
	}

}
