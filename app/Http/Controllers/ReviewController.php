<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
// use App\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function store(Request $request, $rest_id){
        $this->validate($request, [
            'text' => 'required'
        ]);

        $r = new Review;
        $r->restaurant_id = $rest_id;
        $r->user_id = \Auth::user()->id;
        $r->text = $request->input('text');
        $r->save();

        return redirect('/restaurants/'.$rest_id);
    }

    public function edit(Request $request, $id){
        $review = Review::findOrFail($id);
        return view('reviews/edit', compact('review'));   //, compact('r')
    }

    public function update(Request $request, $id){
        $review = Review::findOrFail($id);
        $review->text = $request->input('text');
        $review->save();
        return redirect('/restaurants/'. $review->restaurant_id);
    }

}
