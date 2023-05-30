<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrderRecipesTableAddColumnPaymentStatusId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_status_id')->after('status_id')->nullable();
            $table->dateTime('canceled_menu')->after('updated_at')->nullable();
            $table->dateTime('canceled_menu_returned')->after('canceled_menu')->nullable();
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
            $table->dropColumn('payment_status_id');
            $table->dropColumn('canceled_menu');
            $table->dropColumn('canceled_menu_returned');
        });
    }
}
