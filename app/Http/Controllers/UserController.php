<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::all();
        return view('user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/user/create')
                ->withErrors($validator);
        } else {
            // store
            $item = new User;
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->first_name = $request->input('first_name');
            $item->second_name = $request->input('second_name');
            $item->birth_date = $request->input('birth_date');
            $item->password = bcrypt($request->input('password'));
            $item->save();

            // redirect
            Session::flash('message', 'Utworzono nowego użytkownika!');
            return redirect('/user');
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
        $item = User::find($id);
        return view('user.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::find($id);
        return view('user.edit', compact('item'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|'
        );
        $validator = Validator::make($request->all() , $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/user/create')
                ->withErrors($validator);
        } else {
            // store
            $item = User::find($id);
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->first_name = $request->input('first_name');
            $item->second_name = $request->input('second_name');
            $item->birth_date = $request->input('birth_date');
            $item->password = bcrypt($request->input('password'));
            $item->save();

            // redirect
            Session::flash('message', 'Zmodyfikowano użytkownika!');
            return redirect('/user');
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
        $item = User::find($id);
        $item->delete();

        // redirect
        Session::flash('message', 'Usunięto użytkownika.');
        return redirect('/user');
    }
}
