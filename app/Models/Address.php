<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'address';

	const CREATED_AT = 'created_date';
	const UPDATED_AT = false;
}