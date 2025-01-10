<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPosChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pos_child', function (Blueprint $table) {
            $table->id();
            $table->string('pos_master_id');
            $table->string('Product_id');
            $table->string('Product_Name');
            $table->string('MRP');
            $table->string('Sale_Price');
            $table->string('Quantity');
            $table->string('Total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pos_child');
    }
}
