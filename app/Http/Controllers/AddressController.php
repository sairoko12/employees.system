<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;

class AddressController extends Controller
{
	public function seeMap($address)
	{
		try {
			$address = Address::findOrFail($address);
		} catch (\Exception $e) {
			return response()->json([
				"success" => false
			]);
		}

		$googleKey = config('services.google.publicKey');
		error_log($googleKey);
		$concatAddress = [
			$address->street_name,
			$address->neighborhood,
			$address->municipality, 
			$address->zip_code,
			$address->city, 
			$address->state,
			"México"
		];
		
		$queryParams = [
			"q" => implode(" ", $concatAddress),
			"key" => $googleKey
		];

		$url = "https://www.google.com/maps/embed/v1/search?" . http_build_query($queryParams);

		return response()->json([
			"success" => true,
			"url" => $url
		]);
	}
}