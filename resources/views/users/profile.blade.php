@extends('layouts.login')

@section('content')

<div class='profile_wrapper'>
   <img src="/images/{{$user->images}}">
   <p>{{$user->username}}</p>
   <p>{{$user->bio}}</p>
    @if(!in_array($user->id,array_column($follow_list,'follow')))
      <a><button type="submit" onclick="location.href=`/follow/{{$user->id}}`" class="btn btn-success pull-right">フォローする</button></a>
      @else
      <a><button type="submit" onclick="location.href=`/unfollow/{{$user->id}}`" class="btn btn-success pull-right">フォローをはずす</button></a>
    @endif
</div>
<div class='posts_wrapper'>
    @foreach($user_posts as $user_post)
            <img src="/images/{{$user->images}}">
            <p>{{$user_post->username}}</p>
            <p>{{$user_post->posts}}</p>
            <p>{{$user_post->created_at}}</p>
    @endforeach
</div>


@endsection
