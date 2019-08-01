<?php

namespace App\Http\FormHandlers;

use App\Http\Log;
use App\Http\Requests\HousesRequest as Request;
use App\Models\House;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class HousesHandler {

	// Handle House Object
	public static function save(Request $request, $id = null) {

		if(!$id) {
			$house = new House;
			$type = "create";
		} else {
			$house = House::find($id);
			if(!self::checkAuth($house)) {
				return false;
			}
			$type = "update";
		}

		$house->user_id = Auth::user()->id;
		$house->name = Purifier::clean($request->name);
		$house->gender = Purifier::clean($request->gender);
		$house->max_occupants = Purifier::clean($request->max_occupants);
		$house->address = Purifier::clean($request->address);
		$house->rent = Purifier::clean($request->rent);
		
		if($house->save()) {
			switch($type) {
				case "create":
					Log::save('create', $house->name, 'house');
					break;
				case "update":
					Log::save('update', $house->name, 'house');
					break;
			}
			return true;
		}
			
		return false;
	}

	public static function getHouse($id) {

		$house = House::find($id);

		if(self::checkAuth($house)) {
			return $house;
		}

		return false;
	}

	public static function getRentAmount($houseID) {

		$house = House::find($houseID);
		return $house->rent;

	}

	public static function deleteHouse($id) {
		$house = House::find($id);
		if(self::checkAuth($house)) {
			Log::save('delete', $house->name, 'house');
			$house->delete();
			return true;
		}

		return false;
	}

	public static function getUserHouses() {
		$houses = House::where('user_id', Auth::user()->id)->get();
		$houses_array = [];
		// Assign Default Value
		$houses_array[''] = 'Unassigned';

		foreach($houses as $house) {
		    $houses_array[$house->id] = $house->name;
		}

		return $houses_array;
	}

	private static function checkAuth($house) {
		if($house->user_id === Auth::user()->id) {
			return true;
		}
		return false;
	}

}