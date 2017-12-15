<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MapController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $items = Map::all();
      return view('map.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('map.create');
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
          return redirect('/map/create')
              ->withErrors($validator);
      } else {
          // store
          $item = new Map;
          $item->name = $request->input('name');
          $item->save();

          // redirect
          Session::flash('message', 'Utworzono nowy mapę!');
          return redirect('/map');
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
      $item = Map::find($id);
      return view('map.show', compact('item'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $item = Map::find($id);
      return view('map.edit', compact('item'));
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
          return redirect('/map/create')
              ->withErrors($validator);
      } else {
          // store
          $item = Map::find($id);
          $item->name = $request->input('name');
          $item->save();

          // redirect
          Session::flash('message', 'Zmodyfikowano mapę!');
          return redirect('/map');
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
      $item = Map::find($id);
      $item->delete();

      // redirect
      Session::flash('message', 'Usunięto mapę.');
      return redirect('/map');
  }
}
