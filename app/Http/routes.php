<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
// Route::get('/companies', ['as' => 'companies', 'uses' => 'HomeController@companies']);
// Route::get('/products', ['as' => 'products', 'uses' => 'HomeController@products']);
// Route::get('/purchases', ['as' => 'purchases', 'uses' => 'HomeController@purchases']);
// Route::get('/sales', ['as' => 'sales', 'uses' => 'HomeController@sales']);

Route::get('/companies', ['as' => 'companies', 'uses' => 'HomeController@companies']);
Route::get('/products', ['as' => 'products', 'uses' => 'HomeController@products']);
Route::get('/purchases', ['as' => 'purchases', 'uses' => 'HomeController@purchases']);
Route::get('/expenses', ['as' => 'expenses', 'uses' => 'HomeController@expenses']);
//Route::get('/invoices', ['as' => 'invoices', 'uses' => 'HomeController@invoices']);
Route::get('/tickets', ['as' => 'tickets', 'uses' => 'HomeController@tickets']);
Route::get('/credit_notes', ['as' => 'credit_notes', 'uses' => 'HomeController@credit_notes']);




// Route::resource('accounts', 'AccountController');
// Route::resource('companies', 'CompanyController');
// Route::resource('credit_notes', 'CreditNoteController');
Route::resource('invoices', 'InvoiceController');
// Route::resource('payments', 'PaymentController');
// Route::resource('products', 'ProductController');
// Route::resource('roles', 'RoleController');
// Route::resource('subaccounts', 'SubaccountController');

// Locations

// Route::post('/ubigeo/{code}', ['as' => 'ubigeo', 'uses' => 'HomeController@ajaxUbigeo']);
Route::post('/provinces/{code}', ['as' => 'provinces', 'uses' => 'UserController@provinces']);
Route::post('/districts/{code}', ['as' => 'districts', 'uses' => 'UserController@districts']);

// Users routes

Route::post('/auth/register', ['as' => 'users.register', 'uses' => 'UserController@register']);
Route::get('/profile', ['as' => 'users.profile', 'uses' => 'UserController@profile']);

Route::resource('users', 'UserController');

// Auth and Password Controller

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
