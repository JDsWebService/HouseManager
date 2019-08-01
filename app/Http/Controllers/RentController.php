<?php

namespace App\Http\Controllers;

use App\Http\FormHandlers\OccupantHandler;
use App\Http\FormHandlers\RentHandler;
use App\Http\Requests\RentRequest as Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rent = Auth::user()->rent()->orderBy('received_at', 'desc')->paginate(30);

        return view('rent.index')
                                ->withRent($rent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupants = OccupantHandler::getOccupants();

        return view('rent.create')->withOccupants($occupants);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = RentHandler::save($request);
        if(!$save) {
            Session::flash('danger', 'Something went wrong while saving the Rent Entry');
            return redirect()->route('rent.create');
        }

        Session::flash('success', 'Saved Rent Entry successfully!');
        return redirect()->route('rent.index');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent = RentHandler::getRent($id);
        $occupants = OccupantHandler::getOccupants();
        if(!$rent) {
            Session::flash('danger', 'You do not have permission to edit this rent!');
            return redirect()->route('rent.index');
        }

        return view('rent.edit')
                                ->withRent($rent)
                                ->withOccupants($occupants);
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
        $save = RentHandler::save($request, $id);
        if(!$save) {
            Session::flash('danger', 'Something went wrong while saving the Rent Entry');
            return redirect()->route('rent.edit', $id);
        }

        Session::flash('success', 'Saved Rent Entry successfully!');
        return redirect()->route('rent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = RentHandler::delete($id);

        if(!$delete) {
            Session::flash('danger', 'You do not have permission to delete this rent entry!');
            return redirect()->route('rent.index');
        }

        Session::flash('success', 'You have deleted the Rent Entry Successfully!');
        return redirect()->route('rent.index');
    }
}
