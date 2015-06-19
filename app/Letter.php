<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    //
    public $timestamps = false;
    protected $hidden = ['id'];

    public function words()
    {
        return $this->hasMany('App\Word');
    }
}
