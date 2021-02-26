<?php

use Illuminate\Database\Seeder;
use App\Typology;
use App\User;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Typology::class,25) -> create() 
        ->each(function($typo){
            $user = User::inRandomOrder() -> limit(rand(1,8)) -> get();
            $typo -> users()-> attach($user);  
        });
    }
}
