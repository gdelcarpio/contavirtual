<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;

use App\User;
use App\Department;
use App\Province;
use App\District;
use App\Level;

class UserController extends Controller {

	public function __construct()
	{
		// $this->middleware('auth');
		$this->middleware('admin', ['except' => [ 'profile',  'register'] ]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::idDescending()->paginate(20);
		
		$count['users'] = User::all()->count();

		return view('users.index', compact('users', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departments = Department::lists('name', 'id');
		$departments = array('' => 'Seleccione') + $departments;
		$levels = Level::lists('name', 'id');
		$levels = array('' => 'Seleccione') + $levels;

		return view('users.create', compact('departments', 'levels'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		
		$request['password'] =  '123456';

		$user = User::create($request->all());

		$user->roles()->attach(1);

		Session::forget('location');

		\Flash::success('Usuario agregado satisfactoriamente.');

		return \Redirect::route('users.index');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	public function register(RegisterRequest $request)
	{
		$request['level_id'] =  '1';

		$user = User::create($request->except('password_confirmation'));

		$user->roles()->attach(1);
	
		\Flash::success('Usuario registrado satisfactoriamente.');

		return \Redirect::route('home');
	}

	public function profile()
	{
		$user = \Auth::user();

		return view('users.profile', compact('user'));
	}

	public function provinces($id)
    {
        $provinces = Province::where('department_id', $id)->lists('name', 'id');
        $provinces = array('' => 'Seleccione') + $provinces;

        return view('users.provinces', compact('provinces'));
    }

    public function districts($id)
    {
        $districts = District::where('province_id', $id)->lists('name', 'id');
        $districts = array('' => 'Seleccione') + $districts;

        return view('users.districts', compact('districts'));
    }

}
