<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

use App\User;
use App\Payment;

class PaymentController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$column 	= \Input::get('column', 'id');
		$direction  = \Input::get('direction', 'desc');
		$rows  		= \Input::get('rows', 10);

		$q  = trim(\Input::get('q') != "" ) ? trim(\Input::get('q')) : '';

		$searchTerms = $q != '' ? explode(' ', $q) : '';

		$payments = Payment::with(['user'])		
							->join('users', 'users.id', '=', 'user_id')
            			 	->select('payments.*','users.name as name')
							->sortBy(compact('column', 'direction'))
							->where(function($query) use ($searchTerms) {
				                if( $searchTerms != '' )
				                {
				                    foreach($searchTerms as $term){
				                     $query->orWhere('users.name', 'LIKE', '%'. $term .'%');
				                     $query->orWhere('users.lastname', 'LIKE', '%'. $term .'%');
				                     $query->orWhere('invoice', 'LIKE', '%'. $term .'%');
				                    }

				                }
				            })
							->paginate($rows);

		$rows = [
			10 => 10,
			20 => 20,
			30 => 30,
			40 => 40
		];

		return view('payments.index', compact('payments', 'column', 'direction', 'rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::lists('company_name', 'id');
		$users 	= array('' => 'Seleccione') + $users;

		return view('payments.create', compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PaymentRequest $request)
	{
		Payment::create($request->all());
		
		\Flash::success('Pago registrado correctamente.');
		return \Redirect::route('payments.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$payment = Payment::findOrFail($id);

		return view('payments.show', compact('payment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::findOrFail($id);

		$users  = User::lists('company_name', 'id');
		$users 	= array('' => 'Seleccione') + $users;

		return view('payments.edit', compact('payment', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PaymentRequest $request)
	{
		$payment = Payment::findOrFail($id);

		$payment->update($request->all());
		
		\Flash::success('Pago actualizado correctamente.');
		return \Redirect::route('payments.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$payment = Payment::findOrFail($id);

		$payment_user = $payment->user->name . ' ' . $payment->user->lastname;
		$payment_id = $payment->id;

		$payment->delete();

		\Flash::success('Se eliminó el pago #' . $payment_id . ' del usuario ' . $payment_user . ' correctamente.');
		return view('message');
	}

}
