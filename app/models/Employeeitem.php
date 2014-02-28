<?php

class Employeeitem extends Eloquent {

	protected $fillable = array(
		'employee_id',
		'user_id',
		'item_id',
		'remarks',
		'process',
		'status'
	);

	public function item() {
		return $this->belongsTo('Item', 'item_id');
	}


	public function user() {
		return $this->belongsTo('User', 'user_id');
	}


}