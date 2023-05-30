<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserPetsAddWeightNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_pets', function (Blueprint $table) {
            $table->string('weight_notification')->after('unusual_behavior')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_pets', function (Blueprint $table) {
            $table->dropColumn('weight_notification');
        });
    }
}
