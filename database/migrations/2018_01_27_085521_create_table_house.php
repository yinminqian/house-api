<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('genre')->nullable()->comment('房源类型');
            $table->string('house_genre')->nullable()->comment('房源子类型');
            $table->string('bedroom_genre')->nullable()->comment('卧室类型');
            $table->string('house_number')->nullable()->comment('房间数量');
            $table->integer('people_number')->nullable()->comment('容纳的人数');
            $table->string('room_number')->nullable()->comment('卧室数量');
            $table->integer('bed_number')->nullable()->comment('床铺数量');
            $table->string('bed_meg')->nullable()->comment('床铺信息');
            $table->integer('toilet')->nullable()->comment('卫生间数量');
            $table->json('location')->nullable()->comment('地址信息');
            $table->json('convenience')->comment('便利信息');
            $table->json('facility')->comment('可以使用的设施');
            $table->json('photo')->comment('照片');
            $table->string('house_text')->nullable()->commeent('房屋描述');
            $table->json('suit')->comment('适合人群');
            $table->string('house_title')->nullable()->comment('房屋名称');
            $table->json('string')->nullable()->comment('对房客的要求');
            $table->json('regulation')->nullable()->comment('对房屋的守则');
            $table->string('inform')->nullable()->comment('提前通知的时间');
            $table->integer('stay_min')->nullable()->comment('最小入住天数');
            $table->integer('stay_max')->nullable()->comment('最大入住天数');
            $table->integer('max_price')->comment('最高房价');
            $table->integer('min_price')->comment('最低房价');
            $table->integer('fixation')->comment('固定价格');
            $table->string('weeks_discount')->comment('周折扣');
            $table->string('mouth_discount')->comment('月折扣');
            $table->boolean('audit_state')->nullable()->comment('审核状态');
            $table->boolean('submit_state')->nullable()->comment('提交状态');
            $table->boolean('save_state')->nullable()->comment('保存状态');
            $table->integer('audit_admin')->nullable()->commit('审核管理员');
            $table->timestamp('audit_time')->nullable()->commit('审核时间');

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
        Schema::dropIfExists('house');
    }
}
