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

            $table->string('Barcode_1');
            $table->string('Rate_1');
            $table->string('Quantity_1');
            $table->string('Total_1');
            $table->string('Dis_Percent_1');
            $table->string('Dis_Value_1');
            $table->string('Final_Value_1');
            $table->string('Mfg_Date_1');
            $table->string('Exp_Date_1');

            $table->string('Barcode_2');
            $table->string('Rate_2');
            $table->string('Quantity_2');
            $table->string('Total_2');
            $table->string('Dis_Percent_2');
            $table->string('Dis_Value_2');
            $table->string('Final_Value_2');
            $table->string('Mfg_Date_2');
            $table->string('Exp_Date_2');

            $table->string('Barcode_3');
            $table->string('Rate_3');
            $table->string('Quantity_3');
            $table->string('Total_3');
            $table->string('Dis_Percent_3');
            $table->string('Dis_Value_3');
            $table->string('Final_Value_3');
            $table->string('Mfg_Date_3');
            $table->string('Exp_Date_3');

            $table->string('Barcode_4');
            $table->string('Rate_4');
            $table->string('Quantity_4');
            $table->string('Total_4');
            $table->string('Dis_Percent_4');
            $table->string('Dis_Value_4');
            $table->string('Final_Value_4');
            $table->string('Mfg_Date_4');
            $table->string('Exp_Date_4');
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