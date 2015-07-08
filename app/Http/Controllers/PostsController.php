<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

use Auth;
use App\City;
use App\Section;
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
        $section = Section::all();

        return view('board.create_post', compact('user', 'cities', 'section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = new PostCall;
        $introImage = null;
        $images = [];

        if ($request->hasFile('images'))
        {
            $i = 0;

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

                    $file->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $file->crop(600, 450);
                    $file->save('img/posts/'.Auth::id().'/'.$imageName);

                    if ($i == 0)
                    {
                        $introFile = Image::make($image);
                        $introFile->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $introFile->crop(300, 200);
                        $introFile->save('img/posts/'.Auth::id().'/main-'.$imageName);
                        $introImage = 'main-'.$imageName;
                        $i++;
                    }

                    // Creating mini images
                    $file->resize(95, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $file->crop(95, 71);
                    $file->save('img/posts/'.Auth::id().'/mini-'.$imageName);

                    $images[$key]['image'] = $imageName;
                    $images[$key]['mini_image'] = 'mini-'.$imageName;
                }
            }
        }

        $post->sort_id = $post->increment('sort_id');
        $post->user_id = Auth::id();
        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->deal = $request->deal;
        $post->description = $request->description;
        $post->image = $introImage;
        $post->images = serialize($images);
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

        if (Auth::id() != $post->user_id)
        {
            return redirect('/my_posts');
        }

        $cities = City::all();
        $section = Section::all();

        return view('board.edit_post', compact('post', 'cities', 'section'));
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

        if (Auth::id() != $post->user_id)
        {
            return redirect('/my_posts');
            die();
        }

        if ($request->hasFile('images'))
        {
            $i = 0;
            $introImage = null;
            $images = (unserialize($post->images)) ? unserialize($post->images) : [];

            foreach ($request->file('images') as $key => $image)
            {
                if (isset($image))
                {
                    $imageName = $key.'-image-'.str_random(10).'.'.$image->getClientOriginalExtension();

                    if ( ! file_exists('img/posts/'.$post->user_id))
                    {
                        Storage::makeDirectory('img/posts/'.$post->user_id);
                    }

                    $file = Image::make($image);
                    $file->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $file->crop(600, 450);
                    $file->save('img/posts/'.$post->user_id.'/'.$imageName);

                    // Creating mini images
                    $file->resize(95, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $file->crop(95, 71);
                    $file->save('img/posts/'.$post->user_id.'/mini-'.$imageName);

                    if ($i == 0)
                    {
                        if (isset($images[$key]))
                        {
                            Storage::delete('img/posts/'.$post->user_id.'/main-'.$images[$key]['image']);
                        }

                        $introFile = Image::make($image);
                        $introFile->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $introFile->crop(300, 200);
                        $introFile->save('img/posts/'.$post->user_id.'/main-'.$imageName);
                        $introImage = 'main-'.$imageName;
                        $i++;
                    }

                    if (isset($images[$key]))
                    {
                        Storage::delete([
                            'img/posts/'.$post->user_id.'/'.$images[$key]['image'],
                            'img/posts/'.$post->user_id.'/'.$images[$key]['mini_image']
                        ]);

                        $images[$key]['image'] = $imageName;
                        $images[$key]['mini_image'] = 'mini-'.$imageName;
                    }
                    else
                    {
                        $images[$key]['image'] = $imageName;
                        $images[$key]['mini_image'] = 'mini-'.$imageName;
                    }
                }
            }

            $images = array_sort_recursive($images);
            $images = serialize($images);
        }

        // $post->sort_id = 1,
        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->deal = $request->deal;
        $post->description = $request->description;
        $post->image = (isset($introImage)) ? $introImage : $post->image;
        $post->images = (isset($images)) ? $images : $post->images;
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
