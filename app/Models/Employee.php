<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employee';
	protected $primaryKey = 'id';
	protected $fillable = [
        'name',
        'email',
        'date_of_birthday'
    ];

	const CREATED_AT = 'created_date';
	const UPDATED_AT = null;

	public function addresses()
	{
		return $this->hasMany('App\Models\EmployeeAddress', 'employee_id', 'id');
	}
}