<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Invoice;

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
		// $invoices = auth()->user()->invoices->groupBy(function($query) {
  //                                    return Carbon::parse($query->issue_date)->format('F');
  //                                });

		return view('pages.panel');
	}

	public function report()
	{
		$from  		= \Input::get('from', '');
		$to  		= \Input::get('to', '');

		$report['sales']['month']  		 = $this->getInvoicesReport($from, $to, 1);
		$report['expenses']['month']	 = $this->getInvoicesReport($from, $to, 2);
		$report['credit_notes']['month'] = $this->getCreditNotesReport($from, $to);

		$report['sales']['total']  		 = auth()->user()->invoices()->where('invoice_category_id', 1)->dateBetween(compact('from', 'to'))->sum('total');
		$report['expenses']['total']	 = auth()->user()->invoices()->where('invoice_category_id', 2)->dateBetween(compact('from', 'to'))->sum('total');
		$report['credit_notes']['total'] = auth()->user()->credit_notes()->dateBetween(compact('from', 'to'))->sum('credit_notes.total');
		
		$report['sales']['count']  		 = auth()->user()->invoices()->where('invoice_category_id', 1)->dateBetween(compact('from', 'to'))->count();
		$report['expenses']['count']	 = auth()->user()->invoices()->where('invoice_category_id', 2)->dateBetween(compact('from', 'to'))->count();
		$report['credit_notes']['count'] = auth()->user()->credit_notes()->dateBetween(compact('from', 'to'))->count();

		return view('pages.report', compact('report'));
	}

	public function getInvoicesReport($from, $to, $id)
	{
		return auth()->user()->invoices()
				->dateBetween(compact('from', 'to'))
				->where('invoice_category_id', $id)
				->groupBy('YEAR','MONTH')->get([
				    \DB::raw('MONTHNAME(issue_date) as month'),
				    \DB::raw('YEAR(issue_date) as year'),
				    \DB::raw('SUM(total) as total'),
					\DB::raw("count(*) AS count"),
				]);
	}

	public function getCreditNotesReport($from, $to)
	{
		return auth()->user()->credit_notes()
				->dateBetween(compact('from', 'to'))
				->groupBy('YEAR','MONTH')->get([
				    \DB::raw('MONTHNAME(date) as month'),
				    \DB::raw('YEAR(date) as year'),
				    \DB::raw('SUM(credit_notes.total) as total'),
					\DB::raw("count(*) AS count"),
				]);
	}

	// public function report($id)
	// {
	// 	return auth()->user()->invoices()
	// 				->where('invoice_category_id', $id)
	// 				->select([
	// 					\DB::raw("YEAR(issue_date) AS year"),
	// 					\DB::raw("MONTHNAME(issue_date) AS month"),
	// 					\DB::raw("NULLIF(SUM(total),0) AS total"),
	// 					// \DB::raw("sum(month(issue_date) = 1) as ENERO"),
	// 					// \DB::raw("sum(month(issue_date) = 2) as FEBRERO"),
	// 					// \DB::raw("sum(month(issue_date) = 3) as MARZO"),
	// 					// \DB::raw("sum(month(issue_date) = 4) as ABRIL"),
	// 					// \DB::raw("sum(month(issue_date) = 5) as MAYO"),
	// 					// \DB::raw("sum(month(issue_date) = 6) as JUNIO"),
	// 					// \DB::raw("sum(month(issue_date) = 7) as JULIO"),
						
	// 					\DB::raw("count(*) AS count")
	// 				])
	// 				// ->get();
	// 				->whereBetween('issue_date', [Carbon::now()->subdays(200), Carbon::now()])
	// 				->groupBy('YEAR','MONTH')->get();
	// 				// ->groupBy('YEAR','MONTH')
	// 				// ->get([
	// 				//     // \DB::raw('MONTHNAME(issue_date) as month'),
	// 				//     // \DB::raw('YEAR(issue_date) as year'),
	// 				//     \DB::raw("sum(month(`issue_date`) = 1) as 'JAN'"),
	// 				//     \DB::raw("sum(month(`issue_date`) = 2) as 'FEB'"),
	// 				//     \DB::raw('COALESCE(SUM(total), 0) as total'),
	// 				// ]);
	// }

}
