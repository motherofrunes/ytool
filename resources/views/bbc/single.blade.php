@extends('layouts.default')
@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        <h2>{{$post->title}}
            <spall>{{date("y年 m月 d日", strtotime($post->created_at))}}</spall>
        </h2>
        <p>カテゴリ:{{$post->category->name}}</p>
        <p>{{$post->content}}</p>

        <hr/>

        <h3>コメント一覧</h3>
        @foreach($post->comments as $single_comment)
            <h4>{{$single_comment->commenter}}</h4>
            <p>{{$single_comment->comment}}</p>
        @endforeach

        <h3>コメントを投稿する</h3>
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif

        @foreach($errors->all() as $message)
            <p class="bg-danger">
                {{$message}}
            </p>
        @endforeach

        {{ Form::open(['route' => 'comment.store'], array('class' => 'form')) }}

        <div class="form-group">
            <label for="commenter" class="">名前</label>
            <div class="">
                {{ Form::text('commenter', null, array('class' => '')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="">コメント</label>
            <div class="">
                {{ Form::textarea('comment', null, array('class' => '')) }}
            </div>
        </div>

        {{ Form::hidden('post_id', $post->id) }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿する</button>
        </div>


        {{ Form::close() }}
    </div>
@stop