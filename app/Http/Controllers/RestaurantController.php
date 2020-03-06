<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        $rests = Restaurant::all();
        return view('restaurants/index', compact('rests'));
    }

    public function show($id){
        $rest = Restaurant::findOrFail($id);
        return view('restaurants/show', compact('rest'));
    }

}
