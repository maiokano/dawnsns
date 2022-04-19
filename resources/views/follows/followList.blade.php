@extends('layouts.login')

@section('content')

<div class='followlist_wrapper'>
  @foreach($users as $user)
   <a><img src="/images/{{$user->images}}"></a>
  @endforeach
</div>
<div class='posts_wrapper'>
        @foreach($follow_posts as $follow_post)
        <div>
            <img src="images/{{$follow_post->images}}">
            <p>{{$follow_post->username}}</p>
            <p>{{$follow_post->posts}}</p>
            <p>{{$follow_post->created_at}}</p>
        </div>
        @endforeach
    </div>

@endsection
