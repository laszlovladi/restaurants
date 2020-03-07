<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class CommentReply extends Model
{
    public function review(){
        return $this->belongsTo(Review::class);
    }
}
