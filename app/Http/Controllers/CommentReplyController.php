<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\CommentReply;

class CommentReplyController extends Controller
{
    public function reply($id){
        $review = Review::findOrFail($id);
        return view('/comment-reply/reply', compact('review'));
    }

    public function store(Request $request, $review_id){
        $this->validate($request, [
            'text' => 'required'
        ]);

        $cr = new CommentReply;
        $cr->comment_id = $review_id;
        $cr->text = $request->input('text');
        $cr->save();

        return redirect('/restaurants/'.$request->input('rest_id'));

    }
}
