<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_states', function (Blueprint $table) {
            $table->increments('id');
            $table->json('time_reserve')->nullable()->comment('预定时间数组');
            $table->string("house_id")->nullable()->comment("房源编号");
            $table->json("reserve_poke")->nullable()->comment('预定人和预定时间');
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
        Schema::dropIfExists('house_states');
    }
}
