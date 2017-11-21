<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/employees')->group(function () {
	Route::get('/', function () {
		return view('employees.view', ['employees' => \App\Models\Employee::all()]);
	});

	Route::get('/add', function () {
		return view('employees.add');
	});

	Route::post('/add', 'EmployeeController@add');

	Route::post('/address/{id}', 'EmployeeController@addAddress');
});

Route::prefix('/addresses')->group(function () {
	Route::get('/add', function() {
		return view('address.add', ['employees' => \App\Models\Employee::all()]);
	});
});