<?php

namespace App\Http\Controllers;

use App\Intervention;
use App\Interventiontype;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Intervention::all();
        return view('intervention.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interventiontypes = Interventiontype::pluck('name', 'id');
        $units = Unit::pluck('id', 'id');
        return view('intervention.create', compact('interventiontypes','units'));
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
            'description' => 'required|string',
            'date' => 'required|date',
            'interventionType_id'       => 'required',
            'unit_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('/intervention/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Intervention;
            $item->interventionType_id = $request->input('interventionType_id');
            $item->unit_id = $request->input('unit_id');
            $item->description = $request->input('description');
            $item->date = $request->input('date');
            if($request->input('finished') != null) {
                $item->finished = '1';
            }else {
                $item->finished = '0';
            }
            $item->save();
            // redirect
            Session::flash('message', 'Utworzono nową interwencje!');
            return redirect('/intervention');
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
        $item = Intervention::find($id);
        return view('intervention.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Intervention::find($id);
        $interventiontypes = Interventiontype::pluck('name', 'id');
        $units = Unit::pluck('id', 'id');
        return view('intervention.edit', compact('item','interventiontypes','units'));
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
            'description' => 'required|string',
            'date' => 'required|date',
            'interventionType_id'       => 'required',
            'unit_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/intervention/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Unit::find($id);
            $item->interventionType_id = $request->input('interventionType_id');
            $item->unit_id = $request->input('unit_id');
            $item->description = $request->input('description');
            $item->date = $request->input('date');
            if($request->input('finished') != null) {
                $item->finished = '1';
            }else {
                $item->finished = '0';
            }
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano interwencje!');
            return redirect('/intervention');
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
        $item = Intervention::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto interwencje.');
        return redirect('/intervention');
    }
}
