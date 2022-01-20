<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsParentClassToQuizClassGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_class_grades', function (Blueprint $table) {
            $table->boolean('is_parent_class')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_class_grades', function (Blueprint $table) {
            $table->dropColumn('is_parent_class');
        });
    }
}
