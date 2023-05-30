<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyInfosAddColumnsOtherSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_infos', function (Blueprint $table) {
            $table->string('currency')->nullable();
            $table->string('timezone')->nullable();
            $table->string('date_format')->nullable();
            $table->string('unit_of_measure')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_infos', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropColumn('timezone');
            $table->dropColumn('date_format');
            $table->dropColumn('unit_of_measure');
        });
    }
}
