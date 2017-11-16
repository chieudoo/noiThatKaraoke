<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "category";
    protected $fillable = [];

    public function tuvan()
    {
        return $this->hasMany('App\Models\Tuvan');
    }

    public function sanpham()
    {
        return $this->hasMany('App\Models\Sanpham');
    }
}
