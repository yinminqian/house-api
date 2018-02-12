<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAmend1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('photo')->nullable()->comment("头像");
            $table->json('life_photo')->nullable()->comment('生活照');
            $table->string('referral')->nullable()->comment('自我介绍');
            $table->string('sex')->nullable()->comment('性别');
            $table->string('birthday')->nullable()->comment('生日');
            $table->string('last-name')->nullable()->comment('姓氏');
            $table->string('name')->nullable()->comment('名字');
            $table->string('dwell')->nullable()->comment('住过的地方');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}
