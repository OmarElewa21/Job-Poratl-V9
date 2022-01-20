<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIsNegativeColumnFromCategoryClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_classes', function (Blueprint $table) {
            $table->dropColumn('is_negative');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_classes', function (Blueprint $table) {
            $table->boolean('is_negative')->default(true);
        });
    }
}
