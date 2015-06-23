<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

use Auth;
use App\City;
use App\PostCall;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('board.posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = City::all();

        return view('board.create_post', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = new PostCall;

        dd($request->all());
        exit();

        // $post->sort_id = 1,
        $post->user_id = Auth::id();
        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->deal = $request->deal;
        $post->description = $request->description;
        $post->images = $request->images;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->comment = $request->comment;
        $post->save();

        // echo "<pre>", print_r($request->all()), "</pre>";
        // dd($request->all());
        // exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
