<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('typology_user' , function(Blueprint $table){
            $table->foreign('user_id' , 'ut-users')
            ->references('id')
            ->on('users');
            $table->foreign('typology_id' , 'ut-typology')
            ->references('id')
            ->on('typologies');
    });

    Schema::table('item_order' , function(Blueprint $table){
        $table->foreign('item_id' , 'io-item')
        ->references('id')
        ->on('items');
        $table->foreign('order_id' , 'io-order')
        ->references('id')
        ->on('orders');
    });

    Schema::table('items' , function(Blueprint $table){
        $table->foreign('user_id' , 'user-item')
        ->references('id')
        ->on('users');
    });

}

    public function down()
    {
        Schema::table('items' , function (Blueprint $table){
            $table -> dropForeign('user-item');
        });

        Schema::table('item_order' , function (Blueprint $table){
            $table->dropForeign('io-item');
            $table->dropForeign('io-order');
        });
        Schema::table('typology_user' , function (Blueprint $table){
            $table->dropForeign('ut-typology');
            $table->dropForeign('ut-users');
        });
    }
}
