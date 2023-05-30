<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableOrderRecipesAddDetailsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->float('grams')->after('recipe_name');
            $table->float('kcal')->after('grams');
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
            $table->dropColumn('grams');
            $table->dropColumn('kcal');
        });
    }
}
