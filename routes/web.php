<?php

//Route::get('/home', 'HomeController@index');

// auth routes

Route::get('/login', [
	'uses' => 'Auth\LoginController@login'
]);
Route::post('/login', [
	'uses' => 'Auth\LoginController@postLogin'
]);
Route::post('/logout', [
	'uses' => 'Auth\LoginController@postLogout'
]);

//Route::get('/register', 'Auth\RegistrationController@register');

Route::group(['middleware' => 'admin'], function(){

	Route::get('/', [
		'uses' => 'DashboardController@index',
		'as' => 'dashboard.home'
	]);

	Route::resource('users', 'UsersController');
	Route::resource('patients', 'PatientsController');
	Route::resource('tests', 'TestsController');

	// appointments
	Route::get('/appointments/check', 'AppointmentsController@checkAvailableSlots');
	Route::resource('appointments', 'AppointmentsController');

	//Route::resource('posts', 'Admin\PostsController');
	//Route::resource('posts', 'PostsController');
	Route::resource('slots', 'SlotsController');

	// samples
	// Route::get('samples/create/{a_id}', [
	// 	'as' => 'samples.collect', 
	// 	'uses' => 'SamplesController@create'
	// ]);
	Route::resource('samples', 'SamplesController');

	Route::resource('fields', 'FieldsController');
	//Auth::routes();

	// report
	Route::get('reports/print/{id}', [
		'as' => 'reports.print', 
		'uses' => 'ReportsController@printReport'
	]);
	Route::resource('reports', 'ReportsController');

	// invoices
	Route::get('invoices/print/{id}', [
		'as' => 'invoices.print', 
		'uses' => 'InvoicesController@printInvoice'
	]);
	Route::resource('invoices', 'InvoicesController');
	Route::resource('payments', 'PaymentsController');


	// seperate routes for patient dashboard
	//Route::get('/home/appointment', 'PatientDashboardController@appointment')

});


// route group for all routes of patient dashboard
Route::group(['prefix' => 'home', 'as' => 'home.', 'middleware' => 'admin', 'namespace' => 'Patient'], function () {

    // appointments
	Route::get('/appointments/check', 'AppointmentsController@checkAvailableSlots');
	Route::resource('appointments', 'AppointmentsController');

	// report
	Route::get('/reports/print/{id}', [
		'as' => 'reports.print', 
		'uses' => 'ReportsController@printReport'
	]);
	Route::resource('reports', 'ReportsController');

	// invoices
	Route::get('/invoices/print/{id}', [
		'as' => 'invoices.print', 
		'uses' => 'InvoicesController@printInvoice'
	]);
	Route::resource('invoices', 'InvoicesController');

	Route::resource('payments', 'PaymentsController');


});


// route group for frontend
Route::group(['prefix' => 'front', 'as' => 'front.', 'namespace' => 'Front'], function () {

    // appointments
	Route::get('/index', ['uses' => 'HomeController@index', 'as' => 'index']);
	Route::get('/register', ['uses' => 'HomeController@register', 'as' => 'register']);
	Route::post('/register', ['uses' => 'HomeController@postRegister']);



});