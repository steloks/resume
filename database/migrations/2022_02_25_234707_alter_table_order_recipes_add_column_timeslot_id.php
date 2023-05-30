<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableOrderRecipesAddColumnTimeslotId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('timeslot_id')->after('address_id');
            $table->foreign('timeslot_id')->references('id')->on('time_slots');
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
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('timeslot_id');
        });
    }
}
