<?php

class EmployeeController extends BaseController {


	public function index()	{
		$user = User::find(Auth::user()->id);

		return View::make('employee.home')
				->with('user', $user);
	}

	public function form() {
		return View::make('employee.form')
				->with('date', $date = date("m/d/Y H:i:s"));
	}

	public function add() {
		$validation = Employee::validate_new_employee(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('employee_form')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			$employee = Employee::create(array(
				'department' => Input::get('department'),
				'name' => Input::get('name')
			));


			return Redirect::to('checklist/' . $employee->id);
		}

	}

	public function search_form() {
		return View::make('employee.search');
	}

	public function search() {
		$list = Employee::where('name', 'LIKE', '%' . Input::get('name') . '%')->get();

		return View::make('employee.list')
				->with('list', $list);
	}

}