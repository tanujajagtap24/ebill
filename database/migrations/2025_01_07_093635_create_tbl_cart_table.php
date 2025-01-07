<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Product_id');
            $table->string('Product_Name');
            $table->string('Quantiy');
            $table->string('MRP');
            $table->string('Total');
            $table->string('Sale_Price');
            $table->string('FinalAmount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cart');
    }
}
