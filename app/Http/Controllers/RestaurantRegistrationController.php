<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Restaurant;

class RestaurantRegistrationController extends Controller
{
    public function form(){
        return view('auth.restaurant-register');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->input('restaurant_name'),
            'city' => $request->input('restaurant_city'),
            'description' => $request->input('restaurant_description')
        ]);

        //use Illuminate\Support\Facades\Auth;
        Auth::attempt([
            'email' => $user->email,
            'password' => $request->input('password')
        ]);

        return redirect('/home');
    }
}
