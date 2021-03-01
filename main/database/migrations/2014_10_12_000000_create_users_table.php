<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('address',150);
            $table->string('vat_num',150);
            $table->string('phone_num',150);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('start_delivery')->nullable();
            $table->string('end_delivery')->nullable();
            $table->integer('price_delivery')->nullable();
            $table->float('lat')-> nullable();
            $table->float('long')-> nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
