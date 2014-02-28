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

}