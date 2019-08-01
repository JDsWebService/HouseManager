<?php

namespace App\Http;

use App\Models\UserLog;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Log {

	public static function save($action, $target_name = null, $target_type = null) {
		$log = new UserLog;
		$log->user_id = Auth::user()->id;
		$log->source_ip = self::getIP();
		$log->source_browser = self::getBrowser();
		$log->source_os = self::getOperatingSystem();
		$log->action = $action;
		$log->route = Route::currentRouteName();
		$log->target_name = $target_name;
		$log->target_type = $target_type;
		$log->save();
	}

	// Get User's Log Files
	public static function get($id) {
		$logs = UserLog::where('user_id', $id)->orderBy('created_at', 'desc')->simplePaginate(20);

		return $logs;
	}

	// Get the Users IP Address
	private static function getIP() {
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    } else {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	// Get the Users Browser
	private static function getBrowser() {
		$agent = new Agent;
		$browser = $agent->browser();
		$version = $agent->version($browser);
		return $browser . ' v' . $version;
	}

	// Get User's Operating System
	private static function getOperatingSystem() {
		$agent = new Agent;
		$platform = $agent->platform();
		return $platform;
	}


}