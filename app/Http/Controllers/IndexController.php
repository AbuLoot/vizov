<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use App\Post;
use App\Profile;

class IndexController extends Controller
{
    public function getIndex()
    {
        $sections = Section::where('service_id', 1)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

        return view('board.section', compact('sections'));
    }

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
        $section = Section::where('slug', $section)->first();
        $posts = Post::where('section_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $profiles = Profile::take(5)->get();

        return view('board.posts_call', compact('posts', 'section', 'profiles'));
    }

    public function showPostCall($post, $id)
    {
        $post = Post::findOrFail($id);

        return view('board.show_post', compact('post'));
    }

    // Repair

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
        $section = Section::where('slug', $section)->first();
        $posts = Post::where('section_id', $id)->paginate(10);

        return view('board.posts_repair', compact('posts', 'section'));
    }

    public function showPostRepair($post, $id)
    {
        $post = Post::findOrFail($id);

        return view('board.show_post', compact('post'));
    }

    public function searchPosts(Request $request)
    {
        $text = trim(strip_tags($request->get('text')));

        $posts = Post::where('title', 'LIKE', '%'.$text.'%')
            ->orWhere('description', 'LIKE', '%'.$text.'%')
            ->where('status', 1)
            ->paginate(10);

        return view('board.found_posts', compact('text', 'posts'));
    }

    public function filterPosts(Request $request)
    {
        $query  = ($request->section_id)
            ? 'section_id = ' . (int) $request->section_id . ' AND '
            : null;

        $query .= ($request->city_id)
            ? 'city_id = ' . (int) $request->city_id . ' AND '
            : null;

        $query .= ($request->image == 'on')
            ? 'image IS NOT NULL AND '
            : null;

        $query .= ($request->from)
            ? 'price >= ' . (int) $request->from . ' AND '
            : 'price >= 0 AND ';

        $query .= ($request->to)
            ? 'price <= ' . (int) $request->to
            : 'price <= 9999999';

        $section = Section::find($request->section_id);
        $posts = Post::whereRaw($query)
            ->where('status', 1)
            ->paginate(10);

        return view('board.found_posts', compact('posts', 'section'));
    }
}
