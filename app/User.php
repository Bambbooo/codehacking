<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Set the connection to Role
     */
    public function role(){
        return $this->belongsTo('App\Role');
    }

    /**
     * relation to photo
     */
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function isAdmin(){

        if($this->role->name == "Administrator" && $this->is_active == 1){
            return true;
        } else{
            return false;
        }

    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
