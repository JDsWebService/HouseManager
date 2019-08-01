<?php

namespace App\Http\FormHandlers;

use App\Http\FormHandlers\HousesHandler;
use App\Http\FormHandlers\OccupantHandler;
use App\Http\Requests\RentRequest as Request;
use App\Models\Rent;
use Carbon\Carbon;
use Mews\Purifier\Facades\Purifier;

class RentHandler {

	public static function save(Request $request, $id = null) {

		$rent = new Rent;

		$rent->occupant_id = $request->occupant_id;
		$rent->user_id = Auth::user()->id;
		$rent->amount = Purifier::clean($request->amount);
		$rent->check_number = Purifier::clean($request->check_number);
		$rent->received_at = Purifier::clean($request->received_at);

		if($rent->save()) {
			return true;
		}

		return false;

	}

	public static function getOccupantRent($occupantID) {

		$rent = Rent::where('occupant_id', $occupantID)->orderBy('received_at', 'desc')->get();

		if(!$rent->count()) {
			return null;
		}

		return $rent;
	}

	public static function getOccupantBalance($occupantID) {

		$occupant = OccupantHandler::getOccupant($occupantID);

		$to = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
		$from = Carbon::createFromFormat('Y-m-d', $occupant->move_in_date);
		$diff_in_months = $to->diffInMonths($from);
		
		$houseRent = HousesHandler::getRentAmount($occupant->house_id);

		$totalRent = $diff_in_months * $houseRent;
		$paidRent = Rent::where('occupant_id', $occupantID)->get();
		$totalPaid = 0;
		foreach($paidRent as $payment) {
			$totalPaid += $payment->amount;
		}

		$balance = $totalRent - $totalPaid;

		return $balance;


	}




}