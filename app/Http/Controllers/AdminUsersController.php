<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Profile;
use App\City;
use App\Section;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $profiles = Profile::paginate(40);

        return view('admin.users.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        $posts = $profile->user->posts()->orderBy('id', 'DESC')->get();

        return view('admin.users.show', compact('profile', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        $cities = City::all();
        $section = Section::all();

        return view('admin.users.edit', compact('profile', 'cities', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        if ($request->hasFile('avatar'))
        {
            $avatar = 'ava-'.str_random(20).'.'.$request->file('avatar')->getClientOriginalExtension();

            if ( ! file_exists('img/users/'.$profile->user->id))
            {
                Storage::makeDirectory('img/users/'.$profile->user->id);
            }

            $file = Image::make($request->file('avatar'));
            $file->fit(300, null);
            $file->crop(300, 300);
            $file->save('img/users/'.$profile->user->id.'/'.$avatar);

            if ( ! empty($profile->avatar))
            {
                Storage::delete('img/users/'.$profile->user->id.'/'.$profile->avatar);
            }
        }

        $profile->user->name = $request->name;
        $profile->user->save();

        $profile->city_id = $request->city_id;
        if ($request->section_id != 0)
            $profile->section_id = $request->section_id;
        $profile->phone =  $request->phone;
        $profile->skills = $request->skills;
        $profile->address = $request->address;
        $profile->website = $request->website;
        if (isset($avatar))
            $profile->avatar = $avatar;
        $profile->save();

        return redirect('/my_profile')->with('status', 'Профиль обновлен!');
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
