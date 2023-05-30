<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPrepareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_prepare', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_data_id');
            $table->unsignedBigInteger('object_id');
            $table->double('amount');
            $table->tinyInteger('is_prepared')->default(0);
            $table->date('date');
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
        Schema::dropIfExists('food_prepare');
    }
}
