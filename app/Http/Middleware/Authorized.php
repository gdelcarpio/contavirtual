<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authorized {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		if ( has_debts() AND ! is_admin() )
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				$message = has_payments() ? 'No se encuentra al día en sus pagos.' : 'Límite de comprobantes alcanzado. Renueve su cuenta al plan Premium.';

				flash()->warning($message);
				return redirect()->guest('/');
			}
		}

		return $next($request);
	}

}
