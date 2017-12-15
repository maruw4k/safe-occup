<?php

namespace App\Http\Controllers;

use App\Officer;
use App\Rank;
use App\Station;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class OfficerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Officer::all();
        return view('officer.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $ranks = Rank::pluck('name', 'id');
        $stations = Station::pluck('name', 'id');
        $units = Unit::pluck('id', 'id');
        return view('officer.create',  compact('users','ranks','stations','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'user_id'       => 'required',
            'rank_id'       => 'required',
            'station_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('/officer/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Officer;
            $item->user_id = $request->input('user_id');
            $item->rank_id = $request->input('rank_id');
            $item->station_id = $request->input('station_id');
            $item->unit_id = $request->input('unit_id');
            if($request->input('drivers_licence') != null) {
                $item->drivers_licence = '1';
            }else {
                $item->drivers_licence = '0';
            }
            $item->save();
            // redirect
            Session::flash('message', 'Utworzono nowego strażnika!');
            return redirect('/officer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Officer::find($id);
        return view('officer.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Officer::find($id);
        $users = User::pluck('name', 'id');
        $ranks = Rank::pluck('name', 'id');
        $stations = Station::pluck('name', 'id');
        $units = Unit::pluck('id', 'id');
        return view('officer.edit',  compact('item','users','ranks','stations','units'));
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
        $rules = array(
            'user_id'       => 'required',
            'rank_id'       => 'required',
            'station_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/officer/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Officer::find($id);
            $item->user_id = $request->input('user_id');
            $item->rank_id = $request->input('rank_id');
            $item->station_id = $request->input('station_id');
            $item->unit_id = $request->input('unit_id');
            if($request->input('drivers_licence') != null) {
                $item->drivers_licence = '1';
            }else {
                $item->drivers_licence = '0';
            }
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano strażnika!');
            return redirect('/officer');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Officer::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto strażnika.');
        return redirect('/officer');
    }
}
