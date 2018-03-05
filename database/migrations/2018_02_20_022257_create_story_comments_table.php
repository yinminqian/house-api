<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStory_commentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->comment('父级id');
            $table->longText('comment')->comment('评论');
            $table->integer('user_id')->comment('评论人');
            $table->integer('article_id')->comment('文章');
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
        Schema::dropIfExists('story_comments');
    }
}
