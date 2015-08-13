<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

use Auth;
use App\City;
use App\Section;
use App\Post;
use Image;
use Storage;

class PostsController extends Controller
{
    protected $file;

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
        $section = Section::findOrFail($request->section_id);

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

                    if ($i == 0)
                    {
                        $i++;
                        $mainFile = Image::canvas(300, 200, '#ffffff');
                        $introFile = Image::make($image);

                        $this->file = $introFile;
                        $this->optimalResize(300, 200);

                        $mainFile->insert($this->file, 'center');
                        $mainFile->rectangle(0, 0, 299, 199, function ($draw) {
                            $draw->border(1, '#dddddd');
                        });

                        $mainFile->save('img/posts/'.Auth::id().'/main-'.$imageName);
                        $introImage = 'main-'.$imageName;
                    }

                    // Creating images
                    $moreFile = Image::canvas(600, 450, '#ffffff');
                    $file = Image::make($image);

                    $this->file = $file;
                    $this->optimalResize(600, 450);

                    $moreFile->insert($this->file, 'center');
                    $moreFile->rectangle(0, 0, 599, 449, function ($draw) {
                        $draw->border(1, '#dddddd');
                    });

                    $moreFile->save('img/posts/'.Auth::id().'/'.$imageName);

                    // Creating mini images
                    $miniFile = Image::canvas(95, 71, '#ffffff');

                    $this->file = $file;
                    $this->optimalResize(95, 71);

                    $miniFile->insert($this->file, 'center');
                    $miniFile->rectangle(0, 0, 94, 70, function ($draw) {
                        $draw->border(1, '#dddddd');
                    });

                    $miniFile->save('img/posts/'.Auth::id().'/mini-'.$imageName);

                    $images[$key]['image'] = $imageName;
                    $images[$key]['mini_image'] = 'mini-'.$imageName;
                }
            }
        }

        $post = new Post;
        $post->user_id = Auth::id();
        $post->city_id = $request->city_id;
        $post->service_id = $section->service_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        if ($request->deal)
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
        $post = Auth::user()->posts()->find($id);
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
        $post = Auth::user()->posts()->find($id);

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

                    if ($key == 0)
                    {
                        if ($post->image != NULL AND file_exists('img/posts/'.$post->user_id.'/'.$post->image))
                        {
                            Storage::delete('img/posts/'.$post->user_id.'/'.$post->image);
                        }

                        $mainFile = Image::canvas(300, 200, '#ffffff');
                        $introFile = Image::make($image);

                        $this->file = $introFile;
                        $this->optimalResize(300, 200);

                        $mainFile->insert($this->file, 'center');
                        $mainFile->rectangle(0, 0, 299, 199, function ($draw) {
                            $draw->border(1, '#dddddd');
                        });
                        $mainFile->save('img/posts/'.$post->user_id.'/main-'.$imageName);
                        $introImage = 'main-'.$imageName;
                    }

                    // Creating images
                    $moreFile = Image::canvas(600, 450, '#ffffff');
                    $file = Image::make($image);

                    $this->file = $file;
                    $this->optimalResize(600, 450);

                    $moreFile->insert($this->file, 'center');
                    $moreFile->rectangle(0, 0, 599, 449, function ($draw) {
                        $draw->border(1, '#dddddd');
                    });
                    $moreFile->save('img/posts/'.$post->user_id.'/'.$imageName);

                    // Creating mini images
                    $miniFile = Image::canvas(95, 71, '#ffffff');

                    $this->file = $file;
                    $this->optimalResize(95, 71);

                    $miniFile->insert($this->file, 'center');
                    $miniFile->rectangle(0, 0, 94, 70, function ($draw) {
                        $draw->border(1, '#dddddd');
                    });
                    $miniFile->save('img/posts/'.$post->user_id.'/mini-'.$imageName);

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

        $post->city_id = $request->city_id;
        $post->section_id = $request->section_id;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->deal = $request->deal;
        $post->description = $request->description;
        if (isset($introImage))
            $post->image = $introImage;
        if (isset($images))
            $post->images = $images;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->comment = $request->comment;
        $post->save();

        return redirect('my_posts')->with('status', 'Объявление добавлено!');
    }

    public function optimalResize($width, $height)
    {
        if ($this->file->width() <= $this->file->height())
        {
            $this->file->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        else
        {
            $this->file->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        if ($this->file->width() > $width OR $this->file->height() > $height)
            $this->file->crop($width, $height);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Auth::user()->posts()->find($id);

        if ( ! empty($post->images))
        {
            $images = unserialize($post->images);

            foreach ($images as $image)
            {
                if ($post->image != NULL AND file_exists('img/posts/'.$post->user_id.'/'.$post->image))
                {
                    Storage::delete('img/posts/'.$post->user_id.'/'.$post->image);
                }

                Storage::delete([
                    'img/posts/'.$post->user_id.'/'.$image['image'],
                    'img/posts/'.$post->user_id.'/'.$image['mini_image']
                ]);
            }
        }

        $post->delete();

        return redirect('/my_posts');
    }
}
