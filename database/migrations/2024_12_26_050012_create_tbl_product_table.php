<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string('Product_Name');
            $table->string('Product_Category');
            $table->string('Quantity');
            $table->string('Rate');
            $table->string('Total');
            $table->string('Dis_Percent');
            $table->string('Dis_Value');
            $table->string('Tax_Percent');
            $table->string('Final_Value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
