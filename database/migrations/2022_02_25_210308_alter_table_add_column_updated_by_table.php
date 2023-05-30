<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddColumnUpdatedByTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('updated_by')->nullable();
            if (!Schema::hasColumn('categories','percentage_type')){
                $table->smallInteger('percentage_type')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('updated_by');
            if (!Schema::hasColumn('categories','percentage_type')){
                $table->dropColumn('percentage_type');
            }
        });
    }
}
