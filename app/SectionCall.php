<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionCall extends Model
{
    protected $table = 'section_call';

    public function posts()
    {
        return $this->hasMany('App\PostCall', 'section_id');
    }
}
