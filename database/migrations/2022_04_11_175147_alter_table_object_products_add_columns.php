<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableObjectProductsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('object_products', function (Blueprint $table) {
            $table->double('buy_price')->nullable();
            $table->double('sell_price')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('object_products', function (Blueprint $table) {
            $table->dropColumn('buy_price');
            $table->dropColumn('sell_price');
            $table->dropColumn('description');
        });
    }
}
