<?php

namespace App;

use App\Model\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable,HasApiTokens;

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

    Public function subMenus(){
        return $this->hasMany('App\Model\Minu','sub_menu_id');
    }

    Public function classes(){
        return $this->hasMany('App\Model\UserClassType');
    }

    public function getdetailbyuserid($user_id){
        try {
            return $this->where("id",$user_id)
            ->first();
        } catch (QueryException $e) {
            return $e; 
        }
    }
    public function getAllUser(){
        try {
            return $this->all();
            
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

    public function getUserDetailsByRoleId($role_id,$statusArrId)
    {
       
          return $this->whereIn('role_id',$role_id)->orderBy('first_name','ASC')->whereIn('status',$statusArrId)->get();
        
    }
    public function getRoleDetailsByAdminArrayId($role_id)
    {
                return $this->
                              whereIn('role_id',$role_id)
                            ->orderBy('first_name','ASC')
                            ->pluck('id')
                            ->toArray(); 
    }
    public function getDetailsAdminId($user_id,$statusArrId)
    {
    return $this->where('id',$user_id)->orderBy('first_name','ASC')->whereIn('status',$statusArrId)->get(); 
    }
    public function getUserDetailsByUserId($user_id,$statusArrId)
    {
     return $this->where('id',$user_id)->orderBy('first_name','ASC')->whereIn('status',$statusArrId)->get();
    }
    // public function getArrIdDetailsByRoleId($user_id,$statusArrId)
    // {
    //    $adminArrayId = Admin::
    //                           where('role_id',$request->role_id)
    //                         ->orderBy('first_name','ASC')
    //                         ->pluck('id')
    //                         ->toArray();
    // }
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
