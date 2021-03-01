<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id') -> unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('ingredients') -> nullable(); 
            $table->integer('price');
            $table->tinyInteger('available');
            $table->tinyInteger('deleted');
            $table->tinyInteger('lactose');
            $table->tinyInteger('gluten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
