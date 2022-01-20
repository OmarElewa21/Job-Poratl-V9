<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_grades', function (Blueprint $table) {
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('guest_id')->nullable();
            $table->foreignId('category_id')->constrained('quiz_categories');
            $table->string('category_grade')->nullable();
            $table->float('category_percentage')->nullable();
            $table->string('result_sign')->nullable();
            $table->text('result_text')->nullable();
            $table->integer('take_number')->default(0);
            $table->boolean('show')->default(false);
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
        Schema::dropIfExists('quiz_grades');
    }
}
