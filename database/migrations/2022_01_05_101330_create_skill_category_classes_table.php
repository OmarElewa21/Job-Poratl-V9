<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillCategoryClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_category_classes', function (Blueprint $table) {
            $table->integer('skill_id');
            $table->text('class_name');
            $table->float('min_score_percentage');
            $table->float('max_score_percentage');
            $table->float('class_weight_from_skill');
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
        Schema::dropIfExists('skill_category_classes');
    }
}
