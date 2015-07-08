<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section_call';

    public function posts()
    {
        return $this->hasMany('App\PostCall', 'section_id');
    }

    public function profiles()
    {
    	return $this->hasMany('App\Profile', 'section_id');
    }
}
