<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'birth_date' => 'date:m/d/Y'
    ];

    protected $dates = [
        'birth_date' => 'date:m-d-Y'
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }


    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'follows_id', 'user_id')
            ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'user_id', 'follows_id')
            ->withTimestamps();
    }

    public function follow($userId)
    {
        return $this->follows()->attach($userId);
        //return $this;
    }

    public function unfollow($userId)
    {
        return $this->follows()->detach($userId);
        //return $this;
    }

    public function isFollowing($userId)
    {
      //  dd($this->followers->contains($userId));
      //  dd($this->follows->contains(3));
        return (boolean) $this->follows->contains($userId);
    }

}
