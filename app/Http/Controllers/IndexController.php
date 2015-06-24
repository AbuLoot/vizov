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

    public function showCall($slug, $id)
    {
        $section = SectionCall::where('slug', $slug);
        $posts = PostCall::where('section_id', $id)->paginate(10);

        $breadcrumbs = [
            trans(Request::segment(1)),
            $section->title,
        ];

        return view('board.posts', compact('posts', 'breadcrumbs'));
    }

    public function getRepair()
    {
        $sections = SectionRepair::all();

    	return view('board.section_repair', compact('sections'));
    }

    public function showRepair($slug, $id)
    {
        $posts = PostRepair::where('section_id', $id)->paginate(10);
        $service = trans($slug);

        return view('board.posts', compact('posts'));
    }
}
