<?php

class Employee extends Eloquent {

	protected $fillable = array(
		'name',
		'department'
	);

	public static function validate_new_employee($data) {
		$rules = array(
			'name' => 'required',
			'department' => 'required'
		);

		return Validator::make($data,$rules);
	}

	public function item_status($item_id) {
		$status = Employeeitem::where('employee_id', '=', $this->id)
			->where('item_id', '=', $item_id)
			->orderBy('created_at', 'DESC')
			->first();

		if($status) {
			return $status->status;
		} else {
			return NULL;
		}
	}

}