<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Product;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$user       = \Auth::user();		
		$rows  	    = \Input::get('rows', 10);
		
		$column 	= \Input::get('column', 'id'); //columna a ordenr
		$direction  = \Input::get('direction', 'desc'); //tipo de orden

		$q  = trim(\Input::get('q')) != "" ? trim(\Input::get('q')) : '';
		$searchTerms = $q != '' ? explode(' ', $q) : '';

		$products   = Product::where('user_id',$user->id)
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
		                       
		$rows = getRowsNumber();

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
		
		\Flash::success('Se agregó el producto correctamente.');
		return redirect()->route('products.index');
	}

	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('products.show', compact('product'));
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
		\Flash::success('Se eliminó el producto ' . $product->name . ' correctamente.');
		$product->delete();

		return view('message');
	}

	public function ajaxPrice($product_id, $quantity)
	{
		$product = \Auth::user()->products->find($product_id);
		$quantity = $quantity != 0 ? $quantity : 1;

		return view('invoices.partials.form-price', compact('product', 'quantity'));
	}

	public function ajaxAddToCart($product_id, $quantity)
	{
		if (!\Cart::has($product_id)) {

			$product = Product::findOrFail($product_id);
			
			\Cart::add([
			    'id'       => $product->id,
			    'name'     => $product->name,
			    'quantity' => $quantity,
			    'price'    => $product->price
			]);

			$product = \Cart::get($product_id);

			return view('invoices.partials.form-product', compact('product'));
		}
	}

	public function ajaxEmptyCart()
	{
		\Cart::clear();
	}

	public function ajaxRemoveFromCart($id)
	{
		\Cart::remove($id);
	}

	public function ajaxTotalCart()
	{
		return view('invoices.partials.form-total');
	}

	public function ajaxIgv($igv)
	{
		if (is_numeric($igv) AND $igv >= 0 AND $igv <= 100) {
			session(['igv' => $igv]);
		}
		
		return view('invoices.partials.form-total');
	}

	public function exportToExcel()
	{
    	$products = auth()->user()->products()->get();

		\Excel::create('CONTAVIRTUAL | Productos ', function($excel) use ($products){

			$excel->setCreator('CONTAVIRTUAL')
            	  ->setCompany('CONTAVIRTUAL');

		    $excel->sheet('Lista de Productos', function($sheet) use ($products){

		        $sheet->loadView('products.excel')->with('products', $products);
		        $sheet->freezeFirstRow();

		    });

		})->download('xls');
	}

}