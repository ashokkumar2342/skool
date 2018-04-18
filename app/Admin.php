<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Role;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function role()
    // {
    //     return $this->belongsToMany(Role::class,'role_admins');
    // }
    protected $fillable = [
        'name', 'email', 'password',
    ];

     public function roles(){
        return $this->hasOne('App\Model\Role','id','role_id');
    } 
    Public function minus(){
        return $this->hasMany('App\Model\Minu');
    }

    Public function classes(){
        return $this->hasMany('App\Model\UserClassType');
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
