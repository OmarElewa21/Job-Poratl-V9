<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_combinations', function (Blueprint $table) {
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->string('category_ids');
            $table->string('signs');
            $table->string('parent_category_id');
            $table->string('result_sign');
            $table->text('result_meaning');
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
        Schema::dropIfExists('category_combinations');
    }
}
