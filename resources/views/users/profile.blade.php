@extends('layouts.login')

@section('content')

<div class='profile_wrapper'>
    @foreach($users as $user)
   <img src="/images/{{$user->images}}">
   <p>{{$user->username}}</p>
   <p>{{$user->bio}}</p>
    @if(!in_array($user->id,array_column($follow_list,'follow')))
      <a><button type="submit" onclick="location.href=`/follow/{{$user->id}}`" class="btn btn-success pull-right">フォローする</button></a>
      @else
      <a><button type="submit" onclick="location.href=`/unfollow/{{$user->id}}`" class="btn btn-success pull-right">フォローをはずす</button></a>
    @endif
    @endforeach
</div>
<div class='posts_wrapper'>
    @foreach($users as $user)
            <img src="images/{{$user->images}}">
            <p>{{$user->username}}</p>
            <p>{{$_post->posts}}</p>
            <p>{{$->created_at}}</p>
    @endforeach
</div>


@endsection
