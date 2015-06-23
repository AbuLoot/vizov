<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function getMyPosts()
    {
    	return view('profile.my_posts');
    }

    public function getMyProfile()
    {
    	$user = User::find(Auth::id());

    	return view('profile.my_profile', compact('user'));
    }

    public function getMySetting()
    {
    	return view('profile.my_setting');
    }
}
