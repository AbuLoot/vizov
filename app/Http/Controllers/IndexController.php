<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Service;
use App\Section;
use App\Post;
use App\Profile;

class IndexController extends Controller
{
    // Section Call

    public function getCall()
    {
        $service = Service::where('slug', 'uslugi_vyzova')->first();
        $sections = Section::where('service_id', 1)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

    	return view('board.section', compact('service', 'sections'));
    }

    public function showCall($section, $id)
    {
        $cities = City::all();
        $section = Section::where('slug', $section)->first();
        $profiles = Profile::take(5)->get();
        $posts = Post::where('section_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('board.posts', compact('cities', 'section', 'profiles', 'posts'));
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
        $service = Service::where('slug', 'uslugi_remonta')->first();
        $sections = Section::where('service_id', 2)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

    	return view('board.section', compact('service', 'sections'));
    }

    public function showRepair($section, $id)
    {
        $cities = City::all();
        $section = Section::where('slug', $section)->first();
        $profiles = Profile::take(5)->get();
        $posts = Post::where('section_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('board.posts', compact('cities', 'section', 'profiles', 'posts'));
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
        $service = Service::where('slug', 'stroymaterialy')->first();
        $sections = Section::where('service_id', 3)
            ->where('status', 1)
            ->orderBy('sort_id')
            ->get();

        return view('board.section', compact('service', 'sections'));
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
        $posts = Post::where('status', 1)
            ->where(function($query) use ($text) {
                return $query->where('title', 'LIKE', '%'.$text.'%')
                ->orWhere('description', 'LIKE', '%'.$text.'%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('board.found_posts', compact('cities', 'text', 'posts', 'profiles'));
    }

    public function filterPosts(Request $request)
    {
        $query  = ($request->city_id)
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

        if ($request->text)
        {
            $text = trim(strip_tags($request->text));
            $query .= " AND (title LIKE '%$text%' or description LIKE '%$text%')";
        }

        $cities = City::all();
        $sections = Section::all();
        $profiles = Profile::take(5)->get();

        if ($request->section_id)
        {
            $section = Section::find($request->section_id);
            $posts = Post::where('status', 1)
                ->where('section_id', $request->section_id)
                ->whereRaw($query)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $posts->appends([
                'section_id' => (int) $request->section_id,
                'city_id' => (int) $request->city_id,
                'text' => $request->text,
                'image' => ($request->image == 'on') ? 'on' : NULL,
                'from' => (int) $request->from,
                'to' => (int) $request->to,
            ]);
        }
        else
        {
            $posts = Post::where('status', 1)
                ->whereRaw($query)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $posts->appends([
                'city_id' => (int) $request->city_id,
                'text' => $request->text,
                'image' => ($request->image == 'on') ? 'on' : NULL,
                'from' => (int) $request->from,
                'to' => (int) $request->to,
            ]);
        }

        return view('board.found_posts', compact('cities', 'section', 'sections', 'profiles', 'posts'));
    }
}
