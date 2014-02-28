<?php

class EmployeeitemsController extends BaseController {


	public function checklist($id)	{
		$user = User::find(Auth::user()->id);
		$employeeitems = Employeeitem::where('employee_id', '=', $id)->get();
		$employee = Employee::find($id);
		$items = Item::all();

		return View::make('employee.checklist')
				->with('employee', $employee)
				->with('employeeitems', $employeeitems)
				->with('items', $items)
				->with('user', $user);
	}

	public function add() {
		$employee_item = Employeeitem::where('employee_id', '=', Input::get('employee_id'))
									->where('item_id', '=', Input::get('item_id'))
									->orderBy('created_at', 'desc')
									->first();

		if(is_null($employee_item)) {
			$input = Input::all();
			unset($input['_token']);
			$item = Employeeitem::create($input);

			return Redirect::to('checklist/' . Input::get('employee_id'))
							->with('message', 'Succesful');
		} else {
			if(Input::get('status') == $employee_item->status) {
				$message = 'Oooops ! ' . $employee_item->item->name . ' has already been processed by ' .  $employee_item->user->username . ' last ' . $employee_item->created_at;

				return Redirect::to('checklist/' . Input::get('employee_id'))
							->with('error', $message);
			} else {
				$input = Input::all();
				unset($input['_token']);
				$item = Employeeitem::create($input);

				return Redirect::to('checklist/' . Input::get('employee_id'))
				->with('message', 'Succesful');
			}

			
		}


	}

}