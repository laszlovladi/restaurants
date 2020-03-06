@extends('layouts.app')

@section('content')
  @auth
    <div class="container" style="padding: 2rem">
      @if($review->user == \Auth::user())
        <h1>Edit review:</h1>
        <form action="{{ action('ReviewController@edit', [$review->id])}} " method="post">
          @csrf
          <textarea name="text" id="" cols="60" rows="10">{{$review->text}}</textarea><br>
          <button type="submit">Update</button>
        </form>
      @else
        Access denied!
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
