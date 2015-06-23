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

class ProfileController extends Controller
{
    public function getMyPosts()
    {
    	return view('profile.my_posts');
    }

    public function getMyProfile()
    {
    	$user = User::find(Auth::id());
        $cities = City::all();

    	return view('profile.my_profile', compact('user', 'cities'));
    }

    public function postMyProfile(MyProfileRequest $request, $id)
    {
        
        $profile = Profile::find($id);
        $profile->user->name = $request->name;
        $profile->city_id = $request->city_id;
        // $profile->service_id = ($request->service_id != 0) ? $request->service_id : ;
        $profile->phone =  $request->phone;
        $profile->skills = $request->skills;
        $profile->address = $request->address;
        $profile->website = $request->website;
        // $profile->avatar = $request->avatar;
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
