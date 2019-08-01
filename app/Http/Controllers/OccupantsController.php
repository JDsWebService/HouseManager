<?php

namespace App\Http\Controllers;

use App\Http\FormHandlers\HousesHandler;
use App\Http\FormHandlers\OccupantHandler;
use App\Http\FormHandlers\RentHandler;
use App\Http\Requests\OccupantRequest as Request;
use App\Models\Occupant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OccupantsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants = Occupant::where('user_id', Auth::user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(20);

        return view('occupants.index')
                                ->withOccupants($occupants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Grab Houses Array
        $houses_array = HousesHandler::getUserHouses();
        
        return view('occupants.create')
                                ->withHousesArray($houses_array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = OccupantHandler::save($request);

        if(!$save) {
            Session::flash('danger', 'Something went wrong when adding the occupant!');
            return redirect()->route('user.dashboard');
        }

        Session::flash('success', 'You have added the occupant successfully!');

        return redirect()->route('occupants.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupant = OccupantHandler::getOccupant($id);

        if(!$occupant) {
            Session::flash('danger', 'You do not have permission to view this occupant!');
            return redirect()->route('user.dashboard');
        }

        $rent = RentHandler::getOccupantRent($id);

        $balance = RentHandler::getOccupantBalance($id);

        return view('occupants.show')
                                ->withOccupant($occupant)
                                ->withRent($rent)
                                ->withBalance($balance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupant = OccupantHandler::getOccupant($id);

        if(!$occupant) {
            Session::flash('danger', 'You do not have permission to view this occupant!');
            return redirect()->route('user.dashboard');
        }

        // Grab Houses Array
        $houses_array = HousesHandler::getUserHouses();

        return view('occupants.edit')
                                ->withOccupant($occupant)
                                ->withHousesArray($houses_array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $save = OccupantHandler::save($request, $id);

        if(!$save) {
            Session::flash('danger', 'Something went wrong when saving the occupant!');
            return redirect()->route('user.dashboard');
        }

        Session::flash('success', 'You have saving the occupant successfully!');

        return redirect()->route('occupants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = OccupantHandler::deleteOccupant($id);

        if(!$destroy) {
            Session::flash('danger', 'Something went wrong when deleting the Occupant!');
            return redirect()->route('user.dashboard');
        }

        Session::flash('success', 'You have deleted the Occupant successfully!');
        return redirect()->route('user.dashboard');
    }
}
