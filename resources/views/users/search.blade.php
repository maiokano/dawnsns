@extends('layouts.login')

@section('content')

<div class='container'>
      <div class='user_search'>
        <form action="/search" method="post">
          @csrf
          <input type="text" name="username">
          <button type="submit" class="btn btn-success pull-right">検索</button>
        </form>
      </div>

  <div class='followerlist_wrapper'>
    @foreach($users as $user)
    <div >
      <img src="images/{{$user->images}}">
      <p>{{$user->username}}</p>
      @if(!in_array($user->id,array_column($follow_list,'follow')))
      <a><button type="submit" onclick="location.href=`/follow/{{$user->id}}`" class="btn btn-success pull-right">フォローする</button></a>
      @else
      <a><button type="submit" onclick="location.href=`/unfollow/{{$user->id}}`" class="btn btn-success pull-right">フォローをはずす</button></a>
      @endif

    </div>
    @endforeach
  </div>

</div>

@endsection
