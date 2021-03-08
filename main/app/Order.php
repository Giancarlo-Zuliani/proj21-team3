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
        'payment_status',
    ];
    public function items(){
        return $this -> belongsToMany(Item::class)->withPivot('quantity');
    }
}
