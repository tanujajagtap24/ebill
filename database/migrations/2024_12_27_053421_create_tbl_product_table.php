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
            $table->string('HSN_Code');
            $table->string('Product_Category');
            $table->string('Product_Brand');
            $table->string('Tax_Percent');
            $table->string('Tax_Type');
            $table->string('Primary_Unit');
            $table->string('Alternate_Unit');
            $table->string('Conversion_Factor');
            $table->string('Barcode');
            $table->string('Rate');
            $table->string('Quantity');
            $table->string('Total');
            $table->string('Dis_Percent');
            $table->string('Dis_Value');
            $table->string('Final_Value');
            $table->string('Mfg_Date');
            $table->string('Exp_Date');


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
