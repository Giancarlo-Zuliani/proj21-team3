<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'vat_num',
        'phone_num',
        'img',
        'email',
        'email_verified_at',
        'start_delivery',
        'end_delivery',
        'price_delivery',
        'lat',
        'long',
        'password'
    ];
    public function items(){
        return $this->hasMany(Item::class);
    }
    public function typologies(){
        return $this->belongsToMany(Typology::class);
    }
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
