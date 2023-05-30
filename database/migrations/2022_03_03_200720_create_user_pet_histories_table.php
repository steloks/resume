<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPetHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_pet_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_pet_id');
            $table->string('key')->nullable();
            $table->text('value')->nullable();

            //todo with this doesn't work, figure out why when more time is available
//            $table->foreign('pet_id')->references('id')->on('user_pets');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_pet_histories');
    }
}
