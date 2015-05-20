<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pages.panel');
	}

	public function companies()
	{
		return view('pages.companies');
	}

	public function products()
	{
		return view('pages.products');
	}

	public function purchases()
	{
		return view('pages.purchases');
	}

	public function sales()
	{
		return view('pages.sales');
	}	

	public function expenses()
	{
		return view('pages.expenses');
	}

    public function tickets()
    {
        return view('pages.tickets');
    }
    public function credit_notes()
    {
        return view('pages.credit_notes');
    }

}
