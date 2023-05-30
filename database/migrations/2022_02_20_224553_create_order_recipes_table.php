<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('order_recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('status_id');
            $table->dateTime('date');
            $table->string('recipe_name');
            $table->decimal('price', 12, 6);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('pet_id')->references('id')->on('user_pets');
            $table->foreign('address_id')->references('id')->on('user_addresses');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('order_recipes');
    }
}
