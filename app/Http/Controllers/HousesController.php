<?php

namespace App\Http\Controllers;

use App\Http\FormHandlers\HousesHandler;
use App\Http\Requests\HousesRequest as Request;
use Illuminate\Support\Facades\Session;

class HousesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = HousesHandler::save($request);

        if(!$save) {
            Session::flash('danger', 'Something went wrong when saving the house!');
            return redirect()->route('user.dashboard');
        }

        Session::flash('success', 'You have added the house successfully!');

        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house = HousesHandler::getHouse($id);

        if(!$house) {
            Session::flash('danger', 'You do not have permission to view this house!');
            return redirect()->route('user.dashboard');
        }

        return view('houses.show')
                                ->withHouse($house);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = HousesHandler::getHouse($id);

        return view('houses.edit')
                                ->withHouse($house);
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
        $save = HousesHandler::save($request, $id);

        if(!$save) {
            Session::flash('danger', 'Something went wrong when saving the house!');
            return redirect()->route('user.dashboard');
        }

        $house = HousesHandler::getHouse($id);

        Session::flash('success', 'You have saved your changes to the house successfully!');
        return redirect()->route('houses.show', $house->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = HousesHandler::deleteHouse($id);

        if(!$destroy) {
            Session::flash('danger', 'Something went wrong when deleting the house!');
            return redirect()->route('user.dashboard');
        }

        Session::flash('success', 'You have deleted the House successfully!');
        return redirect()->route('user.dashboard');
    }
}
