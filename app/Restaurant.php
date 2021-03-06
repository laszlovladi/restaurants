<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['user_id', 'name', 'city', 'description'];

    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function reviews(){
        return $this->hasMany(Review::class); 
    }
}
