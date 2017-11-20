<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employee';

	const CREATED_AT = 'created_date';
	const UPDATED_AT = false;

	public function address()
	{
		return $this->hasMany('App\Models\EmployeeAddress', 'employee_id');
	}
}