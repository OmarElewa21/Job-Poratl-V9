<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTakeAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_take_answers', function (Blueprint $table) {
            $table->bigInteger('quiz_id');
            $table->bigInteger('question_id');
            $table->bigInteger('answer_id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('guest_id')->nullable();
            $table->integer('take_number')->default(0);
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
        Schema::dropIfExists('quiz_take_answers');
    }
}
