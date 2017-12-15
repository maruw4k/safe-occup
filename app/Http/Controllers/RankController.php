<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RankController extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $items = Rank::all();
          return view('rank.index', compact('items'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('rank.create');
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
              return redirect('/rank/create')
                  ->withErrors($validator);
          } else {
              // store
              $item = new Rank;
              $item->name = $request->input('name');
              $item->save();
              // redirect
              Session::flash('message', 'Utworzono nowy stopień!');
              return redirect('/rank');
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
          $item = Rank::find($id);
          return view('rank.show', compact('item'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          $item = Rank::find($id);
          return view('rank.edit', compact('item'));
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
              return redirect('/rank/create')
                  ->withErrors($validator);
          } else {
              // store
              $item = Rank::find($id);
              $item->name = $request->input('name');
              $item->save();

              // redirect
              Session::flash('message', 'Zmodyfikowano stopień!');
              return redirect('/rank');
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
          $item = Rank::find($id);
          $item->delete();

          // redirect
          Session::flash('message', 'Usunięto stopień.');
          return redirect('/rank');
      }
}
