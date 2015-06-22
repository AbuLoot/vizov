<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;


class IndexController extends Controller
{
    public function getIndex()
    {
        // $user = \Auth::user();

        // $user->attachRole(3);

        // if ($user->is('user'))
        // {
        //     echo 'Yes, i am user!';
        // }
        // else
        // {
        //     echo 'No, i am not user!';
        // }

    	return view('board.section_call');
    }

    public function getRepair()
    {
    	return view('board.section_repair');
    }
}
