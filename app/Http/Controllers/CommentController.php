<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Validator;
use App\Comment;

class CommentController extends Controller
{
    public function saveReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:60',
            'email' => 'required|min:8|max:60',
            'comment' => 'required|min:5|max:500',
            'stars' => 'required|integer|between:1,5',

        ]);

        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $url = explode('/', URL::previous());
        $id = end($url);

        if ($request->id === $id AND $request->type === 'profile')
        {
            $comment = new Comment;
            $comment->parent_id = $request->id;
            $comment->parent_type = 'App\Profile';
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->comment = $request->comment;
            $comment->stars = (int) $request->stars;
            $comment->save();

            return redirect()->back()->with('status', 'Отзыв добавлен!');
        }
        else
        {
            return redirect()->back()->with('status', 'Ошибка!');
        }
    }

    public function saveComment(Request $request)
    {
        $url = explode('/', URL::previous());
        $id = end($url);

        if ($request->id === $id AND $request->type === 'post')
        {
            $comment = new Comment;
            $comment->parent_id = $request->id;
            $comment->parent_type = 'App\Post';
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->comment = $request->comment;
            $comment->save();

            return redirect()->back()->with('status', 'Комментарии добавлен!');
        }
        else
        {
            return redirect()->back()->with('status', 'Ошибка!');
        }
    }
}
