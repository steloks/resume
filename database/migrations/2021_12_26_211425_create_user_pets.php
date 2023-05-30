<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('breed_id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->unsignedFloat('age');
            $table->string('gender');
            $table->string('image')->nullable();
            $table->string('weight')->nullable();
            $table->unsignedTinyInteger('weight_lvl')->nullable();
            $table->unsignedTinyInteger('activity_lvl')->nullable();
            $table->unsignedTinyInteger('neutered')->nullable();
            $table->unsignedTinyInteger('disease')->nullable();
            $table->unsignedTinyInteger('unusual_behavior')->nullable();

            $table->foreign('breed_id')->references('id')->on('breeds')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('user_pets');
    }
}
