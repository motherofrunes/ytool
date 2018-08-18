<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return View::make('bbc.index')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return View::make('bbc.single')->with('post', $post);
    }

    public function showCategory($id)
    {
        $category_posts = Post::where('cat_id', $id)->get();
        return View::make('bbc.category')->with('category_posts', $category_posts);
    }

    public function create()
    {
        return View::make('bbc.create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required',
        ];

        $messages = array(
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
            'cat_id.required' => 'カテゴリーを選択してください。',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->passes()) {
            DB::transaction(function () {
                $post = new Post;
                $post->title = Input::get('title');
                $post->content = Input::get('content');
                $post->cat_id = Input::get('cat_id');
                $post->comment_count = 0;

                // TODO Service ディレクトリに切るべき
                $post->save();
            });

            return Redirect::back()
                ->with('message', '投稿が完了しました。');
        } else {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }
}
