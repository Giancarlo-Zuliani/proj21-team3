<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
       'description',
        'ingredients',
        'photo',
        'price',
        'available',
    ];
    public function user(){
        return $this -> belongsTo(User::class);
    }
    public function orders(){
        return $this -> belongsToMany(Order::class);
    }
}
