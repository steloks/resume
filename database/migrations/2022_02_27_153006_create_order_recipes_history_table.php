<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRecipesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_recipes_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_recipe_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('order_recipe_id')->references('id')->on('order_recipes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_recipes_history');
    }
}
