<?php

namespace App;

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
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'profile_photo',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // A user may have 0 or more posts
    public function movements()
    {
        return $this->hasMany('App\Movement');
    } 

    public function associate_members()
    {
        return $this->hasMany('App\Associate_members','main_user_id');
    } 

    public function accounts()
    {
        return $this->hasMany('App\Account','owner_id');
    } 

    public function isAdmin()
    {
        return $this->admin;
    } 

    public function verAdmin()
    {
        return $this->admin;
    } 
}