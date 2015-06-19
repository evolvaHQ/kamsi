<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable  = ['word', 'created_by', 'pronunciation', 'letter_id', 'hits'];

    public function created_by()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }

    public function alphabet()
    {
        return $this->belongsTo('App\Letter', 'letter_id');
    }

    public function getCreatedAtAttribute($value)
    {
        $c = new Carbon();

        return $c->toFormattedDateString($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        $c = new Carbon();

        return $c->toFormattedDateString($value);
    }

}
