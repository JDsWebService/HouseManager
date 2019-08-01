<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    // Define the House Relationship
    public function houses() {
        return $this->hasMany('App\Models\House');
    }
    
    // Define the Occupant Relationship
    public function occupants() {
        return $this->hasMany('App\Models\Ocuppant');
    }

    // Define the User Log Relationship
    public function logs() {
        return $this->hasMany('App\Models\UserLog');
    }

    // Define Rent Relationship
    public function rent() {
        return $this->hasMany('App\Models\Rent');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
