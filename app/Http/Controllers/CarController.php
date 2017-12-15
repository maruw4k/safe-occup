<?php

namespace App\Http\Controllers;

use App\Car;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Car::all();
        return view('car.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::pluck('name', 'id');
        return view('car.create', compact('stations'));
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
            'name'       => 'required|max:60|min:5',
            'station_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/car/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Car;
            $item->name = $request->input('name');
            $item->station_id = $request->input('station_id');
            $item->save();

            // redirect
            Session::flash('message', 'Utworzono nowy samochód!');
            return redirect('/car');
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
        $item = Car::find($id);
        return view('car.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Car::find($id);
        $stations = Station::pluck('name', 'id');
        return view('car.edit', compact('item', 'stations'));
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
            'name'       => 'required|max:60|min:5',
            'station_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/car/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Car::find($id);
            $item->name = $request->input('name');
            $item->station_id = $request->input('station_id');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano samochód!');
            return redirect('/car');
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
        $item = Car::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto samochód.');
        return redirect('/car');
    }
}
