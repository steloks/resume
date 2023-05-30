<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTypesPercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('recipe_types_percentages')) {
            Schema::create('recipe_types_percentages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('recipe_type_id');
                $table->unsignedBigInteger('category_id');
                $table->integer('percentage');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_types_percentage');
    }
}
