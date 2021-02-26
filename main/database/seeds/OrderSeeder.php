<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 50)
           ->create()
           ->each(function($ord){
               $item = Item::inRandomOrder() -> limit(rand(5,15))->get();
               $ord -> items()-> attach($item);
               $ran = rand(1,3);
               $idOrder = $ord -> id;
               DB::update('update item_order set quantity ='. $ran . ' where order_id =' . $idOrder);
            });
    }
}
