<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;

use URL;
use App\City;
use App\Section;
use App\Post;
use App\Profile;
use App\Comment;

class IndexController extends Controller
{
    // Section Call

    public function getCall()
    {
        $sections = Section::where('service_id', 1)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

    	return view('board.section', compact('sections'));
    }

    public function showCall($section, $id)
    {
        $cities = City::all();
        $section = Section::where('slug', $section)->first();
        $posts = Post::where('section_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $profiles = Profile::take(5)->get();

        return view('board.posts', compact('cities', 'posts', 'section', 'profiles'));
    }

    public function showPostCall($post, $id)
    {
        $post = Post::findOrFail($id);
        $post->views = ++$post->views;
        $post->save();

        $profiles = Profile::take(5)->get();

        return view('board.post', compact('post', 'profiles'));
    }

    // Section Repair

    public function getRepair()
    {
        $sections = Section::where('service_id', 2)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

    	return view('board.section', compact('sections'));
    }

    public function showRepair($section, $id)
    {
        $cities = City::all();
        $section = Section::where('slug', $section)->first();
        $posts = Post::where('section_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $profiles = Profile::take(5)->get();

        return view('board.posts', compact('cities', 'posts', 'section', 'profiles'));
    }

    public function showPostRepair($post, $id)
    {
        $post = Post::findOrFail($id);
        $post->views = ++$post->views;
        $post->save();

        $profiles = Profile::take(5)->get();

        return view('board.post', compact('post', 'profiles'));
    }

    // Additional functionality

    public function searchPosts(Request $request)
    {
        $text = trim(strip_tags($request->get('text')));

        $cities = City::all();
        $profiles = Profile::take(5)->get();
        $posts = Post::where('title', 'LIKE', '%'.$text.'%')
            ->orWhere('description', 'LIKE', '%'.$text.'%')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $posts->appends(['text' => $text]);

        return view('board.found_posts', compact('cities', 'text', 'posts', 'profiles'));
    }

    public function filterPosts(Request $request)
    {
        $query  = ($request->section_id)
            ? 'section_id = ' . (int) $request->section_id . ' AND '
            : NULL;

        $query .= ($request->city_id)
            ? 'city_id = ' . (int) $request->city_id . ' AND '
            : NULL;

        $query .= ($request->image == 'on')
            ? 'image IS NOT NULL AND '
            : NULL;

        $query .= ($request->from)
            ? 'price >= ' . (int) $request->from . ' AND '
            : 'price >= 0 AND ';

        $query .= ($request->to)
            ? 'price <= ' . (int) $request->to
            : 'price <= 9999999';

        $cities = City::all();
        $section = Section::findOrFail($request->section_id);
        $profiles = Profile::take(5)->get();
        $posts = Post::whereRaw($query)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $posts->appends([
            'section_id' => (int) $request->section_id,
            'city_id' => (int) $request->city_id,
            'image' => ($request->image == 'on') ? 'on' : NULL,
            'from' => (int) $request->from,
            'to' => (int) $request->to,
        ]);

        return view('board.found_posts', compact('cities', 'section', 'profiles', 'posts'));
    }

    public function saveReview(CommentRequest $request)
    {
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
            $comment->save();

            return redirect()->back()->with('status', 'Отзыв добавлен!');
        }
        else
        {
            return redirect()->back()->with('status', 'Ошибка!');
        }
    }

    public function saveComment(CommentRequest $request)
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
