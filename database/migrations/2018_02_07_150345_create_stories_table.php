<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->longText('content')->comment('内容');
            $table->integer('user_id')->comment('发布人');
            $table->integer('house_id')->nullable()->comment('相关的房屋');
            $table->boolean('publish')->nullable()->comment('是否发表');
            $table->bigInteger('detection')->unsigned()->comment('文章唯一识别码');
            $table->bigInteger('love')->comment('点赞')->default(0);
            $table->bigInteger('collect')->comment('收藏')->default(0);
//            default默认值
            $table->text('cover_photo')->comment('封面');
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
        Schema::dropIfExists('stories');
    }
}
