<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeAddress extends Model
{
	protected $table = 'employee_address';
	protected $primaryKey = false;
	protected $fillable = [
        'employee_id',
        'address_id',
        'alias'
    ];

	public $timestamps = false;
	public $incrementing = false;

	public function employee()
	{
		return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
	}

	public function address()
	{
		return $this->belongsTo('App\Models\Address', 'address_id', 'id');
	}
}