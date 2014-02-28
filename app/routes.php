<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UserController@login');
Route::any('logout', 'UserController@logout');
Route::post('authenticate', 'UserController@authenticate');

Route::get('dashboard', 'EmployeeController@index');
Route::get('employee_form', 'EmployeeController@form');
Route::post('add_employee', 'EmployeeController@add');
Route::get('search_form', 'EmployeeController@search_form');
Route::post('search_employee', 'EmployeeController@search');

Route::get('checklist/{id}', 'EmployeeitemsController@checklist');
Route::post('add_employeeitem', 'EmployeeitemsController@add');
