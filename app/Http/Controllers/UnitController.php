<?php

namespace App\Http\Controllers;

use App\Car;
use App\Station;
use App\Unit;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Unit::all();
        return view('unit.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::pluck('name', 'id');
        $cars = Car::pluck('name', 'id');
        $zones = Zone::pluck('name', 'id');
        return view('unit.create', compact('stations','cars','zones'));
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
            'station_id'       => 'required',
            'car_id'       => 'required',
            'zone_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('/unit/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Unit;
            $item->station_id = $request->input('station_id');
            $item->car_id = $request->input('car_id');
            $item->zone_id = $request->input('zone_id');
            $item->position = $request->input('position');
            $item->save();
            // redirect
            Session::flash('message', 'Utworzono nową jednostke!');
            return redirect('/unit');
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
        $item = Unit::find($id);
        return view('unit.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Unit::find($id);
        $stations = Station::pluck('name', 'id');
        $cars = Car::pluck('name', 'id');
        $zones = Zone::pluck('name', 'id');
        return view('unit.edit', compact('item', 'stations','cars','zones'));
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
            'station_id'       => 'required',
            'car_id'       => 'required',
            'zone_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/unit/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Unit::find($id);
            $item->station_id = $request->input('station_id');
            $item->car_id = $request->input('car_id');
            $item->zone_id = $request->input('zone_id');
            $item->position = $request->input('position');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano jednostke!');
            return redirect('/unit');
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
        $item = Unit::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto jednostke.');
        return redirect('/unit');
    }
}
