<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SectionCall;
use App\SectionRepair;

use App\PostCall;
use App\PostRepair;

class IndexController extends Controller
{
    public function getIndex()
    {
        $sections = SectionCall::all();

        return view('board.section_call', compact('sections'));
    }

    public function getCall()
    {
        $sections = SectionCall::all();

    	return view('board.section_call', compact('sections'));
    }

    public function showCall($section, $id)
    {
        $section = SectionCall::where('slug', $section)->first();
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
        $sections = SectionRepair::all();

    	return view('board.section_repair', compact('sections'));
    }

    public function showRepair($section, $id)
    {
        $section = SectionRepair::where('slug', $section)->first();
        $posts = PostRepair::where('section_id', $id)->paginate(10);

        $breadcrumbs = [
            'first' => trans('words.'.\Request::segment(1)),
            'second' => $section->title
        ];

        return view('board.posts_repair', compact('posts', 'breadcrumbs'));
    }

    public function showPostRepair($post, $id)
    {
        $post = PostRepair::findOrFail($id);

        return view('board.show_post', compact('post'));
    }

    public function searchPosts(Request $request)
    {
        $section_id = (int) $request->section_id;
        $city_id = (int) $request->city_id;
        $image = ($request->image == 'on') ? 'AND image IS NOT NULL' : '';
        $from = ($request->from) ? (int) $request->from : 0;
        $to = ($request->to) ? (int) $request->to : 9999999;

        $section = SectionCall::find($section_id);
        $posts = PostCall::where('section_id', $section_id)
            ->where('city_id', $city_id)
            ->whereRaw('price >= '.$from.' AND price <= '.$to.' '.$image)
            ->where('status', 0)
            ->paginate(20);

        return view('board.posts_call', compact('posts', 'section'));
    }
}
