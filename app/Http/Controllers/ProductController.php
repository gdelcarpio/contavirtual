<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller {

	
	public function index()
	{

		//$search     = $request->get('name');

		$user       = \Auth::user()->id;		
		$rows  	    = \Input::get('rows', 5);
		
		$column 	= \Input::get('column', 'id'); //columna a ordenr
		$direction  = \Input::get('direction', 'desc'); //tipo de orden

		$q  = trim(\Input::get('q') != "" ) ? trim(\Input::get('q')) : '';

		$searchTerms = $q != '' ? explode(' ', $q) : '';

		$products   = Product::where('user_id',$user)
							   ->sortBy(compact('column', 'direction'))
		                       ->where(function($query) use ($searchTerms) {
					                if( $searchTerms != '' )
					                {
					                    foreach($searchTerms as $term){
					                     $query->orWhere('code', 'LIKE', '%'. $term .'%');
					                     $query->orWhere('name', 'LIKE', '%'. $term .'%');
					                     $query->orWhere('description', 'LIKE', '%'. $term .'%');
					                     $query->orWhere('price', 'LIKE', '%'. $term .'%');
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
		$product = Product::findOrFail($id);

		//$user_name = $user->name . ' ' . $user->lastname;

		//$user->roles()->detach();
		$product->delete();

		//\Flash::success('Se eliminó al usuario ' . $user_name . ' correctamente.');
		return view('message');
	}

}
