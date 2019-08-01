<?php

namespace App\Http\FormHandlers;

use App\Http\Log;
use App\Models\Occupant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use SoapBox\Formatter\Formatter;

class OccupantHandler {

	public static function save(Request $request, $id = null) {
		
		if(!$id) {
			$occupant = new Occupant;
			$type = "create";
		} else {
			$occupant = Occupant::find($id);
			$type = "update";
		}

		// Handle Generic Information
		$occupant->user_id = Auth::user()->id;
		$occupant->house_id = Purifier::clean($request->house_id);
		$occupant->first_name = Purifier::clean($request->first_name);
		$occupant->last_name = Purifier::clean($request->last_name);
		
		// Handle JSON
		$occupant->info = self::convertToJSON($request);

		if($occupant->save()) {
			switch($type) {
				case "create":
					Log::save('create', $occupant->fullName, 'occupant');
					break;
				case "update":
					Log::save('update', $occupant->fullName, 'occupant');
					break;
			}
			return true;
		}
			
		return false;
	}

	public static function getOccupant($id) {

		$occupant = Occupant::find($id);

		if(self::checkAuth($occupant)) {
			// Covert From JSON
			$occupant = self::convertFromJSON($occupant);
			return $occupant;
		}

		return false;
	}

	public static function getOccupants() {
		$occupants = Occupant::where('user_id', Auth::user()->id)->orderBy('first_name')->get();
		
		return $occupants;
	}

	public static function deleteOccupant($id) {
		$occupant = Occupant::find($id);

		if(self::checkAuth($occupant)) {
			Log::save('delete', $occupant->fullName, 'occupant');
			$occupant->delete();
			return true;
		}

		return false;
	}

	// Handle JSON Array
	private static function convertToJSON(Request $request) {
		$array = [];

		// --------------------------------------
		// Take parameters and convert to array
		// --------------------------------------

		// General Information
		$array['age'] = Purifier::clean($request->age);
		$array['race'] = Purifier::clean($request->race);
		$array['gender'] = Purifier::clean($request->gender);
		$array['phone_number'] = Purifier::clean($request->phone_number);
		$array['nicknames'] = Purifier::clean($request->nicknames);
		$array['date_of_birth'] = Purifier::clean($request->date_of_birth);
		$array['clean_date'] = Purifier::clean($request->clean_date);
		$array['last_address'] = Purifier::clean($request->last_address);
		// Medical Information
		$array['drugs_of_choice'] = Purifier::clean($request->drugs_of_choice);
		$array['list_of_medications'] = Purifier::clean($request->list_of_medications);
		$array['health_issues'] = Purifier::clean($request->health_issues);
		// Emergency Contact Information
		$array['emergency_name'] = Purifier::clean($request->emergency_name);
		$array['emergency_phone'] = Purifier::clean($request->emergency_phone);
		$array['emergency_address'] = Purifier::clean($request->emergency_address);
		// Probation Information
		$array['probation_officer_name'] = Purifier::clean($request->probation_officer_name);
		$array['probation_officer_phone'] = Purifier::clean($request->probation_officer_phone);
		$array['probation_reason'] = Purifier::clean($request->probation_reason);
		$array['probation_court_date'] = Purifier::clean($request->probation_court_date);
		// Important Dates
		$array['move_in_date'] = Purifier::clean($request->move_in_date);
		$array['move_out_date'] = Purifier::clean($request->move_out_date);
		
		// ----------------
		// Convert To JSON
		// ----------------
		$formatter = Formatter::make($array, Formatter::ARR);
		$json = $formatter->toJson();

		return $json;
	}

	// Convert From JSON
	private static function convertFromJSON(Occupant $occupant) {
		
		// ----------------
		// Convert From JSON
		// ----------------
		$formatter = Formatter::make($occupant->info, Formatter::JSON);
		$array = $formatter->toArray();
		// --------------------------------------
		// Take parameters and insert into Occupant Object
		// --------------------------------------
		// General Information
		$occupant->setAttribute('age', $array['age']);
		$occupant->setAttribute('race', $array['race']);
		$occupant->setAttribute('gender', $array['gender']);
		$occupant->setAttribute('phone_number', $array['phone_number']);
		$occupant->setAttribute('nicknames', $array['nicknames']);
		$occupant->setAttribute('date_of_birth', $array['date_of_birth']);
		$occupant->setAttribute('clean_date', $array['clean_date']);
		$occupant->setAttribute('last_address', $array['last_address']);
		// Medical Information
		$occupant->setAttribute('drugs_of_choice', $array['drugs_of_choice']);
		$occupant->setAttribute('list_of_medications', $array['list_of_medications']);
		$occupant->setAttribute('health_issues', $array['health_issues']);
		// Emergency Contact Information
		$occupant->setAttribute('emergency_name', $array['emergency_name']);
		$occupant->setAttribute('emergency_phone', $array['emergency_phone']);
		$occupant->setAttribute('emergency_address', $array['emergency_address']);
		// Probation Information
		$occupant->setAttribute('probation_officer_name', $array['probation_officer_name']);
		$occupant->setAttribute('probation_officer_phone', $array['probation_officer_phone']);
		$occupant->setAttribute('probation_reason', $array['probation_reason']);
		$occupant->setAttribute('probation_court_date', $array['probation_court_date']);
		// Important Dates
		$occupant->setAttribute('move_in_date', $array['move_in_date']);
		$occupant->setAttribute('move_out_date', $array['move_out_date']);

		return $occupant;
	}

	private static function checkAuth($occupant) {
		if($occupant->user_id === Auth::user()->id) {
			return true;
		}
		return false;;
	}

	
}