@extends('layouts.login')

@section('content')

<div class='followerlist_wrapper'>
  @foreach($users as $user)
   <a><img src="/images/{{$user->images}}"></a>
  @endforeach
</div>
<div class='posts_wrapper'>
        @foreach($follower_posts as $follower_post)
        <div>
            <img src="images/{{$follower_post->images}}">
            <p>{{$follower_post->username}}</p>
            <p>{{$follower_post->posts}}</p>
            <p>{{$follower_post->created_at}}</p>
        </div>
        @endforeach
    </div>

@endsection
