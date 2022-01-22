<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId("commented_by");
            $table->foreign('commented_by')->references('id')->on('user_models');
            $table->text('comment');
            $table->foreignId('posted_on');
            $table->foreign('posted_on')->references('id')->on('post_models');
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
        Schema::dropIfExists('comment_models');
    }
}
