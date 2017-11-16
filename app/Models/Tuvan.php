<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuvan extends Model
{
    protected $table = "tuvan";
    protected $fillable = [];

    public function cat()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
