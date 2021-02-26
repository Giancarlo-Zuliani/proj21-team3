<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class , 50)
            ->make()
            ->each(function($pay){
                $ord = Order::inRandomOrder() -> first();
                $pay -> order() -> associate($ord);
                $pay -> save();
            });
    }
}
