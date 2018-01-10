<?php

namespace App\Http\Controllers;

use App\Car;
use App\Intervention;
use App\User;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $items['number_of_users'] = count(User::all());
         $items['number_of_interventions'] = count(Intervention::all());
         $items['number_of_finish_interventions'] = count(Intervention::all()->where('finished', 1));
         $items['number_of_unfinish_interventions'] = count(Intervention::all()->where('finished', 0));
         $items['max_of_type_intervention'] = count(Intervention::all()->max('finished', 0));
        
        
        return view('stats.index', compact('items'));
    }

}
