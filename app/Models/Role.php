<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role_user";
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function addrole(){
    	return $this->hasMany('App\Models\AddUserRole');
    }
}
