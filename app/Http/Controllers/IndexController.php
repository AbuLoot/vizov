<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use App\Section;

use App\PostCall;
use App\PostRepair;

class IndexController extends Controller
{
    public function getIndex()
    {
        $sections = Section::where('service_id', 1)->get();

        return view('board.section_call', compact('sections'));
    }

    public function getCall()
    {
        $sections = Section::where('service_id', 1)->get();

    	return view('board.section_call', compact('sections'));
    }

    public function showCall($section, $id)
    {
        $section = Section::where('slug', $section)->first();
        $posts = PostCall::where('section_id', $id)->paginate(10);

        return view('board.posts_call', compact('posts', 'section'));
    }

    public function showPostCall($post, $id)
    {
        $post = PostCall::findOrFail($id);

        return view('board.show_post', compact('post'));
    }

    // Repair

    public function getRepair()
    {
        $sections = Section::where('service_id', 2)->get();

    	return view('board.section_repair', compact('sections'));
    }

    public function showRepair($section, $id)
    {
        $section = Section::where('slug', $section)->first();
        $posts = PostRepair::where('section_id', $id)->paginate(10);

        return view('board.posts_repair', compact('posts', 'section'));
    }

    public function showPostRepair($post, $id)
    {
        $post = PostRepair::findOrFail($id);

        return view('board.show_post', compact('post'));
    }

    public function searchPosts(Request $request)
    {
        $text = trim(strip_tags($request->text));

        $posts = PostCall::where('description', 'LIKE', '%'.$text.'%')
            ->orWhere('title', 'LIKE', '%'.$text.'%')
            ->get();

        return view('board.found_posts', compact('text', 'posts'));
    }

    public function filterPosts(Request $request)
    {
        $section_id = ($request->section_id) ? 'section_id = '.$request->section_id.' AND ' : '';
        $city_id = ($request->city_id) ? (int) $request->city_id : '';
        $image = ($request->image == 'on') ? 'AND image IS NOT NULL' : '';
        $from = ($request->from) ? (int) $request->from : 0;
        $to = ($request->to) ? (int) $request->to : 9999999;

        $section = Section::find($section_id);
        $posts = PostCall::where('city_id', $city_id)
            ->whereRaw($section_id.' price >= '.$from.' AND price <= '.$to.' '.$image)
            ->where('status', 0)
            ->get();

        return view('board.found_posts', compact('posts', 'section'));
    }
}
