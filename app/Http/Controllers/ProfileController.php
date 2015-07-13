<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Profile;
use App\City;
use App\Section;
use App\Http\Requests\MyProfileRequest;
use Image;
use Storage;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $profile = Profile::findOrFail($id);

        return view('profile.profile_user', compact('profile'));
    }

    public function getMyPosts()
    {
        $posts = Auth::user()->posts;

    	return view('profile.my_posts', compact('posts'));
    }

    public function getMyProfile()
    {
    	$user = User::find(Auth::id());

    	return view('profile.my_profile', compact('user'));
    }

    public function editMyProfile()
    {
        $user = User::find(Auth::id());
        $cities = City::all();
        $section = Section::all();

        return view('profile.my_profile_edit', compact('user', 'cities', 'section'));
    }

    public function postMyProfile(MyProfileRequest $request, $id)
    {
        if (Auth::id() != $id)
        {
            return redirect('/my_profile')->with('status', 'Молодец! Нам нужны такие толковые парни как ты! =)');
        }

        $profile = Auth::user()->profile;

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

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

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

    public function getMySetting()
    {
    	return view('profile.my_setting');
    }

    public function postResetPassword(Request $request)
    {
        dd($request->all());
    }

    public function postDeleteAccount(Request $request)
    {
        dd($request->all());
    }
}
