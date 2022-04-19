@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<div class='container'>
    <div class='top_wrapper'>
        <h2 class='page-header'>新しく投稿をする</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
    </div>
    <div class='posts_wrapper'>
        @foreach($list as $list)
        <div>
            <img src="images/{{$list->images}}">
            <p>{{$list->username}}</p>
            <p>{{$list->posts}}</p>
            <p>{{$list->created_at}}</p>
            <img src="images/edit.png" class="edit-btn" data-target="{{$list->id}}">
            <a href="/post/{{$list->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
                <img src="images/trash.png" >
            </a>
        </div>
        <div id="{{$list->id}}" class="edit-form">
            {!! Form::open(['url' => 'update']) !!}
            {!! Form::hidden('id', $list->id) !!}
            {!! Form::input('text', 'upPost', $list->posts) !!}
            <button type="submit" class="btn btn-success pull-right">更新</button>
            {!! Form::close() !!}
        </div>
        @endforeach
    </div>
</div>

@endsection
