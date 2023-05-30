<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrderRecipesTableAddPreparedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('prepared_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->dropColumn('prepared_by');
        });
    }
}
