<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Restaurant;
use App\CommentReply;

class Review extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function commentReply(){
        return $this->hasOne(CommentReply::class);
    }
}
