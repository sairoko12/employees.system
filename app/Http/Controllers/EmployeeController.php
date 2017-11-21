<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Employee,
	Address,
	EmployeeAddress
};

class EmployeeController extends Controller
{
	public function add(Request $request)
	{
		$data = $request->validate([
			'name' => 'required|max:100',
			'email' => 'required|email',
			'dob'	=> 'required|date'
		]);

		$employee = new Employee;
		$employee->name = $data['name'];
		$employee->email = $data['email'];
		$employee->date_of_birthday = $data['dob'];
		$employee->save();

		return response()->json([
			'success' => true,
			'employee' => $employee->id,
			'employeeName' => $employee->name
		]);
	}

	public function addAddress(Request $request, $id)
	{
		$data = $request->validate([
			'alias' => 'required|max:150',
			'street' => 'required',
			'zip_code' => 'required|digits:5|max:5',
			'state' => 'required|max:100'
		]);

		$address = new Address;
		$address->street_name = $data['street'];
		$address->interior_number = $request->input('interior');
		$address->neighborhood = $request->input('neighborhood');
		$address->municipality = $request->input('municipality');
		$address->zip_code = $data['zip_code'];
		$address->city = $request->input('city');
		$address->state = $data['state'];
		$address->save();

		$employee = Employee::find($id);
		$employee->addresses()->create([
			"address_id" => $address->id,
			"alias" => $data['alias']
		]);

		return response()->json([
			'success' => true
		]);
	}
}