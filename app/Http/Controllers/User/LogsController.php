<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    public function index() {
    	$logs = Log::get(Auth::user()->id);
    	
    	return view('user.logs')
    							->withLogs($logs);
    }
}
