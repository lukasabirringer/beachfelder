<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Beachcourt;
use App\Notifications\PasswordReset as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName', 'email', 'pictureName', 'password', 'firstName',  'lastName', 'role', 'postalCode', 'city', 'sex', 'confirmationToken', 'isConfirmed', 'birthdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin(){
        return (\Auth::check() && $this->role == 'admin');
    }
    public function isRegular(){
        return (\Auth::check() && $this->role == 'regular');
    }
    public function favorites()
    {
        return $this->belongsToMany(Beachcourt::class, 'favorites', 'user_id', 'beachcourt_id')->withTimeStamps();
    }
    public function rating()
    {
        return $this->hasMany('App\Rating');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
