<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Congtrinh extends Model
{
    protected $table = "congtrinh";
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
