<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }

    public function section_call()
    {
        return $this->hasMany('App\Section');
    }
}
