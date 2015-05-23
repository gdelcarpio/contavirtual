<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

use App\User;
use App\Payment;

class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = Payment::latest()->paginate(20);

		return view('payments.index', compact('payments'));
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
		$payment = Payment::findOrFail($id);

		$users = User::lists('company_name', 'id');
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
		//
	}

}
