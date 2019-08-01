<?php

namespace App\Http\Middleware;

use App\Models\House;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $houses = House::where('user_id', Auth::user()->id)->get();
        View::share('houses', $houses);

        return $next($request);
    }
}
