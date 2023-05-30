<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('batch');
            $table->double('amount')->default(0);
            $table->double('used_amount')->default(0);
            $table->double('left_amount')->default(0);
            $table->double('price')->default(0);
            $table->date('expire_date');
            $table->smallInteger('is_wasted')->default(0);
            $table->date('waste_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_data');
    }
}
