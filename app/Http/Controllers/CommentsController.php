<?php

namespace App\Http\Controllers;

use App\models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function store()
    {
        $rules = [
            'commenter' => 'required',
            'comment' => 'required',
        ];

        $messages = array(
            'commenter.required' => '',
            'comment.required' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->passes()) {
            $comment = new Comment;
            $comment->commenter = Input::get('commenter');
            $comment->comment = Input::get('comment');
            $comment->post_id = Input::get('post_id');
            $comment->save();
            return Redirect::back()->with('message', '投稿が完了しました。');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }
}
