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
    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // // User has many payroll
    // public function userpayroll()
    // {
    //     return $this->hasMany('App\Payroll', 'user_id');
    // }
    // 
    // Relationship. User has send Alert. 1...n
    public function getAlertUser()
    {
        return $this->hasMany('App\SendAlert', 'user_id');
    }
}
