@extends('layouts.default')
@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        @foreach($category_posts as $category_post)
            <h2>タイトル:{{$category_post->title}}
                <small>{{date('y年 m月 d日', strtotime($category_post->created_at))}}</small>
            </h2>
            <p>{{$category_post->content}}</p>
            <p>{{link_to("/bbc/{$category_post->id}", '続きを読む', array('class'=>''))}}</p>
            <p>
                コメント数:{{$category_post->comment_count}}
            </p>
            <hr/>
        @endforeach
    </div>
@stop
