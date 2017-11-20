<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
	protected $table = 'employee_address';
	protected $primaryKey = false;

	public $timestamps = false;

	public function employee()
	{
		return $this->belongsTo('App\Models\Employee', 'id', 'employee_id');
	}

	public function address()
	{
		return $this->hasOne('App\Models\Address', 'id', 'address_id');
	}

	public function add(int $employeeId, int $addressId)
	{
		$this->employee_id = $employeeId;
		$this->address_id = $addressId;

		return $this->save();
	}
}