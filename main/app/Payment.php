<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'final_price',
        'payment_method',
        'payment_status'
    ];
    public function order(){
      return $this->belongsTo(Order::class);
  }
}
