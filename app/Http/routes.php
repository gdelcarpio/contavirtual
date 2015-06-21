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

Route::get('/purchases', ['as' => 'purchases', 'uses' => 'HomeController@purchases']);
Route::get('/tickets', ['as' => 'tickets', 'uses' => 'HomeController@tickets']);
// Route::resource('accounts', 'AccountController');
Route::resource('companies', 'CompanyController');

// Credit Notes routes
Route::delete('/credit-notes/{id}/destroy',			['as' => 'credit-notes.destroy', 'uses' => 'CreditNoteController@destroy']);
Route::post('/invoices/{id}/credit-notes/store',	['as' => 'credit-notes.store',   'uses' => 'CreditNoteController@store']);
Route::get('/invoices/{id}/credit-notes/create',	['as' => 'credit-notes.create',  'uses' => 'CreditNoteController@create']);
Route::get('/credit-notes',							['as' => 'credit-notes.index', 	 'uses' => 'CreditNoteController@index']);
// Route::resource('credit-notes', 'CreditNoteController');

// Invoices routes (Sales and Expenses)
Route::get('/invoices/sales/export',				['as' => 'invoices.sales.excel', 	 'uses' => 'InvoiceController@exportToExcel']);
Route::get('/invoices/sales',						['as' => 'invoices.sales.index', 	 'uses' => 'InvoiceController@index']);
Route::get('/invoices/sales/create',				['as' => 'invoices.sales.create', 	 'uses' => 'InvoiceController@create']);
Route::post('/invoices/sales/store',				['as' => 'invoices.sales.store', 	 'uses' => 'InvoiceController@store']);
Route::get('/invoices/sales/{id}/edit',				['as' => 'invoices.sales.edit', 	 'uses' => 'InvoiceController@edit']);
Route::patch('/invoices/sales/{id}/update',			['as' => 'invoices.sales.update', 	 'uses' => 'InvoiceController@update']);
Route::get('/invoices/sales/{id}/show',				['as' => 'invoices.sales.show', 	 'uses' => 'InvoiceController@show']);
Route::delete('/invoices/sales/{id}',				['as' => 'invoices.sales.destroy', 	 'uses' => 'InvoiceController@destroy']);

Route::get('/invoices/expenses/export',				['as' => 'invoices.expenses.excel',  'uses' => 'InvoiceController@exportToExcel']);
Route::get('/invoices/expenses',					['as' => 'invoices.expenses.index',  'uses' => 'InvoiceController@index']);
Route::get('/invoices/expenses/create',				['as' => 'invoices.expenses.create', 'uses' => 'InvoiceController@create']);
Route::post('/invoices/expenses/store',				['as' => 'invoices.expenses.store',  'uses' => 'InvoiceController@store']);
Route::get('/invoices/expenses/{id}/edit',			['as' => 'invoices.expenses.edit', 	 'uses' => 'InvoiceController@edit']);
Route::patch('/invoices/expenses/{id}/update',		['as' => 'invoices.expenses.update', 'uses' => 'InvoiceController@update']);
Route::get('/invoices/expenses/{id}/show',			['as' => 'invoices.expenses.show', 	 'uses' => 'InvoiceController@show']);
Route::delete('/invoices/expenses/{id}',			['as' => 'invoices.expenses.destroy','uses' => 'InvoiceController@destroy']);

// Payments routes
Route::resource('payments', 'PaymentController');

// Products routes
Route::get('/products/export', 	 		 			['as' => 'products.export.excel','uses' => 'ProductController@exportToExcel']);
Route::post('/igv/{igv}',							['as' => 'products.cart.igv', 	 'uses' => 'ProductController@ajaxIgv']);
Route::post('/cart-total',							['as' => 'products.cart.total',  'uses' => 'ProductController@ajaxTotalCart']);
Route::post('/clear-cart',							['as' => 'products.cart.empty',  'uses' => 'ProductController@ajaxEmptyCart']);
Route::post('/add-product/{product_id}/{quantity}',	['as' => 'products.cart.add', 	 'uses' => 'ProductController@ajaxAddToCart']);
Route::post('/remove-item/{product_id}',			['as' => 'products.cart.remove', 'uses' => 'ProductController@ajaxRemoveFromCart']);
Route::post('/price/{product_id}/{quantity}',	 	['as' => 'products.price',		 'uses' => 'ProductController@ajaxPrice']);
Route::resource('products', 'ProductController');

// Route::resource('roles', 'RoleController');
// Route::resource('subaccounts', 'SubaccountController');

// Locations
Route::post('/provinces/{code}', ['as' => 'provinces', 'uses' => 'UserController@provinces']);
Route::post('/districts/{code}', ['as' => 'districts', 'uses' => 'UserController@districts']);

// Users routes
Route::patch('/users/{users}/reset', 	 ['as' => 'users.password.reset',  'uses' => 'UserController@resetPassword']);
Route::get('/users/export', 	 		 ['as' => 'users.export.excel',    'uses' => 'UserController@exportToExcel']);
Route::patch('/users/password', 		 ['as' => 'users.password.update', 'uses' => 'UserController@updatePassword']);
Route::patch('/users/{users}/active', 	 ['as' => 'users.active', 		   'uses' => 'UserController@active']);
Route::post('/auth/register', 			 ['as' => 'users.register', 	   'uses' => 'UserController@register']);
Route::get('/users/{id}/payments',		 ['as' => 'users.payments.index',  'uses' => 'UserController@paymentsIndex']);
Route::get('/users/{id}/payments/create',['as' => 'users.payments.create', 'uses' => 'UserController@paymentsCreate']);
Route::post('/users/{id}/payments/store',['as' => 'users.payments.store',  'uses' => 'UserController@paymentsStore']);
Route::get('/users/password', 			 ['as' => 'users.password.edit',   'uses' => 'UserController@editPassword']);
Route::get('/my-profile', 				 ['as' => 'users.profile', 		   'uses' => 'UserController@profile']);
Route::get('/my-payments',				 ['as' => 'users.payments',        'uses' => 'UserController@myPayments']);
Route::resource('users', 'UserController');

// Auth and Password Controller
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Cuentas y subcuentas (categorias) - factura
Route::post('/ajax-subaccounts/{id}', 	['as' => 'ajax.subaccounts', 'uses' => 'InvoiceController@ajaxSubaccounts']);
Route::post('/ajax-accounts/{id}', 		['as' => 'ajax.accounts', 	 'uses' => 'InvoiceController@ajaxAccounts']);

//Cargar Cliente
Route::post('/ajax-company/{company_id}', ['as' => 'subaccount', 'uses' => 'CompanyController@ajaxCompany']);

/**
 * Companies 
 */
Route::resource('companies', 'CompanyController');
Route::get('/departament', ['as' => 'departament', 'uses' => 'AssistantController@getDepartament']);
Route::get('/province', ['as' => 'province', 'uses' => 'AssistantController@getProvince']);

