<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Profile;
use App\City;
use App\Http\Requests\MyProfileRequest;
use Image;
use Storage;

class ProfileController extends Controller
{
    public function getMyPosts()
    {
        $posts = Auth::user()->posts_call;

    	return view('profile.my_posts', compact('posts'));
    }

    public function getMyProfile()
    {
    	$user = User::find(Auth::id());

    	return view('profile.my_profile', compact('user', 'cities'));
    }

    public function editMyProfile()
    {
        $user = User::find(Auth::id());
        $cities = City::all();

        return view('profile.my_profile_edit', compact('user', 'cities'));
    }

    public function postMyProfile(MyProfileRequest $request, $id)
    {
        if (Auth::id() != $id)
        {
            return redirect('/my_profile')->with('status', 'Молодец! Нам нужны такие толковые парни как ты! =)');
        }

        $profile = Profile::find($id);

        if ($request->hasFile('avatar'))
        {
            $avatar = 'ava-'.str_random(20).'.'.$request->file('avatar')->getClientOriginalExtension();

            if ( ! file_exists('img/users'.$profile->id))
            {
                Storage::makeDirectory('img/users/'.$profile->id);
            }

            $file = Image::make($request->file('avatar'));
            $file->fit(300, null);
            $file->crop(300, 300);
            $file->save('img/users/'.$profile->id.'/'.$avatar);

            if ( ! empty($profile->avatar))
            {
                Storage::delete('img/users/'.$profile->id.'/'.$profile->avatar);
            }
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        $profile->city_id = $request->city_id;
        if ($request->service_id != 0) 
            $profile->service_id = $request->service_id;
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

    public function postMySetting()
    {

    }
}
