<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
