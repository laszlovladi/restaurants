<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\CommentReply;

class RestaurantController extends Controller
{
    public function index(){
        $rests = Restaurant::all();
        return view('restaurants/index', compact('rests'));
    }

    public function show($id){
        $rest = Restaurant::findOrFail($id);
        $crs = CommentReply::all();
        // foreach($crs as $cr){
        //     if($cr->comment_id == $)
        // }
        // ->where('comment_id', $rest->review)->get();
        // return $crs;
        return view('restaurants/show', compact('rest', 'crs'));  //'cr'
    }

}
