<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Admin::all();
        return view('admin.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('admin.create',  compact('users'));
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
            'user_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('/admin/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new Admin;
            $item->user_id = $request->input('user_id');
            $item->save();
            // redirect
            Session::flash('message', 'Utworzono nowego administratora!');
            return redirect('/admin');
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
        $item = Admin::find($id);
        return view('admin.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Admin::find($id);
        $users = User::pluck('name', 'id');
        return view('admin.edit', compact('item','users'));
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
            'user_id'       => 'required'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/admin/create')
                ->withErrors($validator);
        } else {
            // store
            $item = Admin::find($id);
            $item->user_id = $request->input('user_id');
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano administratora!');
            return redirect('/admin');
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
        $item = Admin::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto administratora.');
        return redirect('/admin');
    }
}
