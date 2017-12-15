<?php

namespace App\Http\Controllers;

use App\InterventionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class InterventionTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InterventionType::all();
        return view('intervention_type.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intervention_type.create');
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
            return redirect('/interventionType/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new InterventionType;
            $item->name = $request->input('name');
            $item->save();
            // redirect
            Session::flash('message', 'Utworzono typ interwencji!');
            return redirect('/interventionType');
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
        $item = InterventionType::find($id);
        return view('intervention_type.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InterventionType::find($id);
        return view('intervention_type.edit', compact('item'));
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
            return redirect('/interventionType/create')
                ->withErrors($validator);
        } else {
            // store
            $item = InterventionType::find($id);
            $item->name = $request->input('name');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano typ interwencji!');
            return redirect('/interventionType');
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
        $item = InterventionType::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto typ interwencji.');
        return redirect('/interventionType');
    }
}
