<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuizCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_quiz_categories', function (Blueprint $table) {
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('category_id')->constrained('quiz_categories');
            $table->unsignedSmallInteger('n_questions');
            $table->float('min_score');
            $table->float('max_score');
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
        Schema::dropIfExists('quiz_quiz_categories');
    }
}
