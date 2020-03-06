@extends('layouts.app')

@section('content')
  @auth
    <div class="container" style="padding: 2rem">
      Restaurant: <h1>{{$rest->name}}</h1>
      Location: <h4>{{$rest->city}}</h4>
      Description: <p>{{$rest->description}}</p>
      Manager: <p><a href="">{{$rest->user->name}}</a></p>
      <a href="{{ action('RestaurantController@index') }}">Back to list</a>
    </div>
  @endauth

  @guest
    <div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center">
      <div style="height: 100%">
        <h1>Please <a href="{{ route('login') }}">sign in</a></h1>
      </div>
    </div>
  @endguest
@endsection