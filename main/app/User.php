<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
