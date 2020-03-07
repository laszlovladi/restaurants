@extends('layouts.app')

@section('content')
  @auth
    <div class="container" style="padding: 2rem">
      @if($review->restaurant->user == \Auth::user())
        <h1>Edit review:</h1>
        @if($review->created_at == $review->updated_at)
          <strong>{{$review->user->name}} {{$review->created_at}} </strong>
        @else
          <strong>{{$review->user->name}} {{$review->created_at}} (updated {{$review->updated_at}})</strong>
        @endif
        <div>
          <p id="text">{{$review->text}}</p>
        </div>
        <form action="{{ action('CommentReplyController@store', [$review->id])}} " method="post">
          @csrf
          <input type="hidden" name="rest_id" value="{{$review->restaurant->id}}">
          <textarea name="text" id="" cols="60" rows="10" placeholder="Reply here..."></textarea><br>
          <button type="submit">Reply</button>
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
