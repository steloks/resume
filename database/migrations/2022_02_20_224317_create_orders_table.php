<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('timeslot_id');
            $table->unsignedBigInteger('status_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('user_postcode');
            $table->string('user_address');
            $table->decimal('total_amount', 12, 6);
            $table->text('comment')->nullable();
            $table->unsignedTinyInteger('agreed_terms');
            $table->unsignedTinyInteger('agreed_privacy');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('timeslot_id')->references('id')->on('time_slots');
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
        Schema::dropIfExists('orders');
    }
}
