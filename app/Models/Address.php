<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'address';
	protected $primaryKey = 'id';
	protected $fillable = [
        'street_name',
        'interior_number',
        'neighborhood',
        'municipality',
        'zip_code',
        'city',
        'state',
        'latitude',
        'altitude'
    ];

	const CREATED_AT = 'created_date';
	const UPDATED_AT = null;
}