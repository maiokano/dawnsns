@extends('layouts.login')

@section('content')

<div class='myprofile_wrapper'>
  <img src="/images/{{$user->images}}">
  <h2 class='username'>UserName</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control']) !!}
        </div>
  {!! Form::close() !!}

  <h2 class='mailaddress'>MailAdress</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control']) !!}
        </div>
  {!! Form::close() !!}

  <h2 class='password'>Password</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control']) !!}
        </div>
  {!! Form::close() !!}

  <h2 class='newpassword'>new Password</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control']) !!}
        </div>
  {!! Form::close() !!}

  <h2 class='bil'>Bio</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control']) !!}
        </div>
  {!! Form::close() !!}

  <h2 class='iconimage'>Icon Image</h2>
  {!! Form::open(['url' => '']) !!}
        <div class="username">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control','placeholder' => 'ファイルを選択']) !!}
        </div>
  {!! Form::close() !!}

  <button type="submit" class="btn btn-success pull-right">更新</button>
</div>


@endsection
