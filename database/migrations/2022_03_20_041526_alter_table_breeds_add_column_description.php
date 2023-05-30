<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBreedsAddColumnDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('breeds', function (Blueprint $table) {
            $table->text('description')->after('name')->nullable();
            $table->string('created_by')->after('updated_at')->nullable();
            $table->string('updated_by')->after('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breeds', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
