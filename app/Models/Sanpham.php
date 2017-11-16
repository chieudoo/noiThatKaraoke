<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "sanpham";
    protected $fillable = [];

    public function cat()
    {
        return $this->belongsTo('App\Models\Category','cat');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
