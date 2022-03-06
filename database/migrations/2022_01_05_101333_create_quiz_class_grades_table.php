<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizClassGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_class_grades', function (Blueprint $table) {
            $table->bigInteger('quiz_id');
            $table->text('class_name');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('guest_id')->nullable();
            $table->integer('take_number')->default(0);
            $table->float('score')->default(0);
            $table->float('max_score')->default(0);
            $table->float('score_percentage')->default(0);
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
        Schema::dropIfExists('quiz_class_grades');
    }
}
