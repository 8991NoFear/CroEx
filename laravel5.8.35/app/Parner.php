<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parner extends Authenticatable
{
    // use Notifiable;

    protected $table = 'parners';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'ratio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    // @author: ledinhbinh
    protected $guard = 'parner';
    //

    public function users()
    {
        return $this->belongsToMany(User::class, 'parner_user_transactions');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
