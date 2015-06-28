<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postRegister(RegisterRequest $request)
	{
		$request['level_id'] =  '1';

		$user = User::create($request->except('password_confirmation'));

		$user->roles()->attach(1);
	
		flash()->success('Usuario registrado satisfactoriamente.');

		return redirect()->route('home');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required'
		]);

		$email 	  = $request->input('email');
		$password = $request->input('password');

		$attempt = $this->auth->attempt(['email' => $email, 'password' => $password, 'active' => 1] , $request->has('remember'));

		if ($attempt)
		{
			return redirect()->intended($this->redirectPath());
		}

		if ($this->auth->validate(['email' => $email, 'password' => $password] , $request->has('remember')))
		{
		    return redirect()->back()->withInput()->withErrors([
						'active' => 'La cuenta ha sido suspendida. Para mayor información contacte al administrador.',
					]);
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => 'Las credenciales ingresadas no son correctas.',
					]);
	}

}
