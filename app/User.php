<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $table ='admins';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getdetailbyuserid($user_id){
    try {
    return $this->where("user_id",$user_id)
    ->first();
    } catch (QueryException $e) {
    return $e; 
    }
    }

    public function updateuserdetail($updArr,$user_id){
    try {
    return $this->where('id',$user_id)
    ->update($updArr);
    } catch (QueryException $e) {
    return $e; 
    }
    }

    public function getdetailbyemail($email){
    try {
    return $this->where("email",$email)
    ->first();
    } catch (QueryException $e) {
    return $e; 
    }
    }
}
