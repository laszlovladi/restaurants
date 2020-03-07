

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
        <textarea name="text" id="" cols="60" rows="5"></textarea><br>
        <button type="submit">Submit a review</button>
      </form><br>
      <h2>Reviews:</h2>
      @if($rest->reviews->count())
        @foreach ($rest->reviews()->orderBy('created_at', 'desc')->get() as $review)
            @if($review->created_at == $review->updated_at)
              <strong>{{$review->user->name}} {{$review->created_at}} </strong>
            @else
              <strong>{{$review->user->name}} {{$review->created_at}} (updated {{$review->updated_at}})</strong>
            @endif
            <div>
              <p id="text">{{$review->text}}</p>
              @foreach($crs as $cr)
                @if($cr->comment_id == $review->id)
                  <div style="padding-left: 2rem; font-style: italic">
                    <strong>{{$rest->user->name}} {{$cr->created_at}} </strong>
                    <p>{{$cr->text}}</p>
                  </div>
                @endif
              @endforeach
              @if($review->user == \Auth::user())
                <form class="edit-form" action="{{ action('ReviewController@edit', [$review->id]) }}" method="get">
                  {{-- @csrf --}}
                  {{-- <textarea name="edit" id="" cols="60" rows="5" style="display: none">{{$review->text}}</textarea> --}}
                  {{-- <input type="hidden" name="review_id" value="{{$review->text}}"> --}}
                  <button type="submit" class="btn-edit">Edit comment</button>
                </form>
              @endif
              @if($rest->user == \Auth::user())
                <form class="reply-form" action="{{ action('CommentReplyController@reply', [$review->id]) }}" method="get">
                  {{-- @csrf --}}
                  {{-- <textarea name="edit" id="" cols="60" rows="5" style="display: none">{{$review->text}}</textarea> --}}
                  {{-- <input type="hidden" name="review_id" value="{{$review->text}}"> --}}
                  <button type="submit" class="btn-reply">Reply to comment</button>
                </form>
              @endif
            </div>
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

@section('script')
    {{-- <script>
      btnEdit = document.querySelector('.btn-edit');
      editForm = document.querySelector('.edit-form');
      btnEdit.addEventListener('click', ()=>{
        document.getElementById('text').style.display = 'none';
        btnEdit.style.display = 'none';
        te = document.createElement('textarea');
        btnSubmitEdited = document.createElement('button');
        console.log("{{$review->text}}");
        te.innerHTML = "{{$review->text}}";
        te.cols = '60';
        te.rows = '5';
        editForm.appendChild(te);
        // editForm.attach(te);
      })
    </script> --}}
@endsection