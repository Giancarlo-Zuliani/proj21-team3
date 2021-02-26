<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'buyer_name',
        'buyer_lastname',
        'address',
        'phone_num',
        'email',
        'discount',
        'total_price',
    ];
    public function items(){
        return $this -> belongsToMany(Item::class);
    }
}
