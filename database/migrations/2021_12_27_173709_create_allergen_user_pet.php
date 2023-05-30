<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenUserPet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_user_pet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_pet_id')->unsigned();
            $table->bigInteger('allergen_id')->unsigned();

            $table->foreign('user_pet_id')->references('id')->on('user_pets')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('allergen_id')->references('id')->on('allergens')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('allergen_user_pet');
    }
}
