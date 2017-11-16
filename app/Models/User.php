<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function congtrinh()
    {
        return $this->hasMany('App\Models\Congtrinh');
    }
    public function role()
    {
        return $this->hasMany('App\Models\Role');
    }

    public function tuvan()
    {
        return $this->hasMany('App\Models\Tuvan');
    }

    public function sanpham()
    {
        return $this->hasMany('App\Models\Sanpham');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
