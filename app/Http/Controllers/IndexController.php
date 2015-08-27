<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Section;
use App\Post;
use App\Profile;

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
        $first_number = rand(1, 10);
        $second_number = rand(1, 10);

        return view('board.post', compact('post', 'profiles', 'first_number', 'second_number'));
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
        $first_number = rand(1, 10);
        $second_number = rand(1, 10);

        return view('board.post', compact('post', 'profiles', 'first_number', 'second_number'));
    }

    // Section Materials

    public function getMaterials()
    {
        $sections = Section::where('service_id', 3)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

        return view('board.section', compact('sections'));
    }

    public function showMaterials($section, $id)
    {
        $cities = City::all();
        $section = Section::where('slug', $section)->first();
        $posts = Post::where('section_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $profiles = Profile::take(5)->get();

        return view('board.posts', compact('cities', 'posts', 'section', 'profiles'));
    }

    public function showPostMaterials($post, $id)
    {
        $post = Post::findOrFail($id);
        $post->views = ++$post->views;
        $post->save();

        $profiles = Profile::take(5)->get();
        $first_number = rand(1, 10);
        $second_number = rand(1, 10);

        return view('board.post', compact('post', 'profiles', 'first_number', 'second_number'));
    }

    // Additional functionality

    public function searchPosts(Request $request)
    {
        $text = trim(strip_tags($request->get('text')));

        $cities = City::all();
        $profiles = Profile::take(5)->get();
        $posts = Post::where('city_id', 1)
            ->where('title', 'LIKE', '%'.$text.'%')
            ->orWhere('description', 'LIKE', '%'.$text.'%')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $posts->appends(['text' => $text]);

        return view('board.found_posts', compact('cities', 'text', 'posts', 'profiles'));
    }

    public function filterPosts(Request $request)
    {
        // dd($request->all());

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
            ? 'price <= ' . (int) $request->to . ' AND '
            : 'price <= 9999999 AND ';

        $query .= ($request->text)
            ? "title LIKE '%$request->text%' or description LIKE '%$request->text%' AND "
            : NULL;

        $query .= 'status = 1';

        $cities = City::all();
        $section = Section::find($request->section_id);
        $sections = Section::all();
        $profiles = Profile::take(5)->get();
        $posts = Post::whereRaw($query)
            ->orderBy('id', 'DESC')
            ->paginate(10);
            // ->toSql();

        // dd($posts);

        $posts->appends([
            'section_id' => (int) $request->section_id,
            'city_id' => (int) $request->city_id,
            'text' => $request->text,
            'image' => ($request->image == 'on') ? 'on' : NULL,
            'from' => (int) $request->from,
            'to' => (int) $request->to,
        ]);

        return view('board.found_posts', compact('cities', 'section', 'sections', 'profiles', 'posts'));
    }
}
