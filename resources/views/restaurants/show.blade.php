@extends('layouts.app')

@section('content')
  @auth
    <div class="container" style="padding: 2rem">
      Restaurant: <h1>{{$rest->name}}</h1>
      Location: <h4>{{$rest->city}}</h4>
      Description: <p>{{$rest->description}}</p>
      Manager: <p><a href="">{{$rest->user->name}}</a></p>
      <a href="{{ action('RestaurantController@index') }}">Back to list</a>
      <br>
      <h2>Leave a review:</h2>
      <form action="{{ action('ReviewController@store', [$rest->id]) }}" method="post">
        @csrf
        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
        {{-- <input type="hidden" name="restaurant_id" value="{{ $rest->id }}"> --}}
        <textarea name="text" id="" cols="60" rows="5"></textarea><br>
        <button type="submit">Submit a review</button>
      </form><br>
      <h2>Reviews:</h2>
      @if($rest->reviews->count())
        @foreach ($rest->reviews as $review)
            <strong>{{$review->user->name}} {{$review->created_at}}</strong>
            <p>{{$review->text}}</p>
            <hr>
        @endforeach
      @else
        No reviews
      @endif
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