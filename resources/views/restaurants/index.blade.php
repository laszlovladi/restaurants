@extends('layouts.app')

@section('content')
  @auth
    <div class="container" style="padding: 2rem">
      <h1>Restaurant list</h1>
      <table>
        <tr>
          <th style="padding: 0 1rem">ID</th>
          <th style="padding: 0 1rem">Restaurant name</th>
          <th style="padding: 0 1rem">City</th>
          <th style="padding: 0 1rem">Description</th>
        </tr>
        @foreach ($rests as $rest)
          <tr>
            <td style="padding: 0 1rem">{{$rest->id}}</td>
            <td style="padding: 0 1rem"><a href="{{ action('RestaurantController@show', [$rest->id]) }}">{{$rest->name}}</a></td>
            <td style="padding: 0 1rem">{{$rest->city}}</td>
            <td style="padding: 0 1rem">{{$rest->description}}</td>
          </tr>
        @endforeach
      </table>
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