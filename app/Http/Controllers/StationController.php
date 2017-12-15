<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Station::all();
        return view('station.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
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
            'name'       => 'required|max:60|min:5'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/station/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Station;
            $item->name = $request->input('name');
            $item->save();

            // redirect
            Session::flash('message', 'Utworzono nowy posterunek!');
            return redirect('/station');
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
        $item = Station::find($id);
        return view('station.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Station::find($id);
        return view('station.edit', compact('item'));
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
            'name'       => 'required|max:60|min:5'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/station/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Station::find($id);
            $item->name = $request->input('name');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano posterunek!');
            return redirect('/station');
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
        $item = Station::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto posterunek.');
        return redirect('/station');
    }
}
