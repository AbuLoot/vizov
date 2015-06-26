<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

use Auth;
use App\City;
use App\PostCall;
use Image;
use Storage;

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
        $user = Auth::user();
        $cities = City::all();

        return view('board.create_post', compact('user', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = new PostCall;

        if ($request->hasFile('images'))
        {
            $images = [];
            foreach ($request->file('images') as $key => $image)
            {
                if (isset($image))
                {
                    $imageName = $key.'-image-'.str_random(10).'.'.$image->getClientOriginalExtension();

                    if ( ! file_exists('img/posts/'.Auth::id()))
                    {
                        Storage::makeDirectory('img/posts/'.Auth::id());
                    }

                    $file = Image::make($image);

                    if ($key == 0)
                    {
                        $file->fit(300, null);
                        $file->crop(300, 260);
                        $file->save('img/posts/'.Auth::id().'/main-'.$imageName);
                        $image = 'main-'.$imageName;
                    }

                    $file->fit(600, null);
                    $file->crop(600, 450);
                    $file->save('img/posts/'.Auth::id().'/'.$imageName);

                    $file->fit(95, null);
                    $file->crop(95, 71);
                    $file->save('img/posts/'.Auth::id().'/mini-'.$imageName);

                    $images[$key]['image'] = $imageName;
                    $images[$key]['mini_image'] = 'mini-'.$imageName;
                }
            }
        }

        // $post->sort_id = 1,
        $post->user_id = Auth::id();
        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        // $post->deal = $request->deal;
        $post->description = $request->description;
        $post->images = $image;
        $post->images = json_encode($images);
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->comment = $request->comment;
        $post->save();

        return redirect('my_posts')->with('status', 'Объявление добавлено!');
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
        $post = PostCall::findOrFail($id);
        $cities = City::all();

        return view('board.edit_post', compact('post', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = PostCall::findOrFail($id);

        if ($request->hasFile('images'))
        {
            $images = [];
            foreach ($request->file('images') as $key => $image)
            {
                if (isset($image))
                {
                    $imageName = $key.'-image-'.str_random(10).'.'.$image->getClientOriginalExtension();

                    if ( ! file_exists('img/posts/'.Auth::id()))
                    {
                        Storage::makeDirectory('img/posts/'.Auth::id());
                    }

                    $file = Image::make($image);

                    if ($key == 0)
                    {
                        $file->fit(300, null);
                        $file->crop(300, 260);
                        $file->save('img/posts/'.Auth::id().'/main-'.$imageName);
                        $image = 'main-'.$imageName;
                    }

                    $file->fit(600, null);
                    $file->crop(600, 450);
                    $file->save('img/posts/'.Auth::id().'/'.$imageName);

                    $file->fit(95, null);
                    $file->crop(95, 71);
                    $file->save('img/posts/'.Auth::id().'/mini-'.$imageName);

                    $images[$key]['image'] = $imageName;
                    $images[$key]['mini-image'] = 'mini-'.$imageName;
                }
            }
        }

        // $post->sort_id = 1,
        $post->user_id = Auth::id();
        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        // $post->deal = $request->deal;
        $post->description = $request->description;
        $post->images = $image;
        $post->images = json_encode($images);
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->comment = $request->comment;
        $post->save();

        return redirect('my_posts')->with('status', 'Объявление добавлено!');
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
