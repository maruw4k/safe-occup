<?php

namespace App\Http\Controllers;

use App\Map;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Zone::all();
        return view('zone.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maps = Map::pluck('name', 'id');
        return view('zone.create', compact('maps'));
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
            'map_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/map/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Zone;
            $item->name = $request->input('name');
            $item->map_id = $request->input('map_id');
            $item->save();

            // redirect
            Session::flash('message', 'Utworzono nową strefę!');
            return redirect('/zone');
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
        $item = Zone::find($id);
        return view('zone.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Zone::find($id);
        $maps = Map::pluck('name', 'id');
        return view('zone.edit', compact('item', 'maps'));
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
            'map_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/zone/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Zone::find($id);
            $item->name = $request->input('name');
            $item->map_id = $request->input('map_id');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano strefę!');
            return redirect('/zone');
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
        $item = Zone::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto strefę.');
        return redirect('/zone');
    }
}
