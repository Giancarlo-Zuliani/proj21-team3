<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\User;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 50)
            ->make()
            ->each(function($item){
                $user = User::inRandomOrder() -> first();
                $item -> user() -> associate($user);
                $item -> save();
            });
    }
}
