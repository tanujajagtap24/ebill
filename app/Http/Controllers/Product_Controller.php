<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\category;
use App\Models\tax;
use App\Models\brand;
use Illuminate\Http\Request\DB;
use Illuminate\Http\Request;

class Product_Controller extends Controller
{
  function Create(Request $request)
  {
    $catData = category::all();
    $taxData = tax::all();
    $brandData = brand::all();
    return view('admin\product\create', compact('catData', 'taxData', 'brandData'));
  }

  function List(Request $request)
  {
    $productData = product::all();

    return view('admin\product\list', compact('productData'));
  }

  function Store(Request $request)
  {
    $add = new product;
    $add->Product_Name = $request->product_name;
    $add->HSN_Code = $request->hsn;
    $add->Product_Category = $request->p_cat;
    $add->Product_Brand = $request->p_brand;
    $add->Tax_Percent = $request->tax_percent;
    $add->Tax_Type = $request->tax_type;
    $add->Primary_Unit = $request->p_unit;
    $add->Alternate_Unit = $request->a_unit;
    $add->Conversion_Factor = $request->c_factor;
    $add->Barcode_1 = $request->barcode_1;
    $add->Rate_1 = $request->rate_1;
    $add->Quantity_1 = $request->qty_1;
    $add->Total_1 = $request->total_1;
    $add->Dis_Percent_1 = $request->dis_percent_1;
    $add->Dis_Value_1 = $request->dis_value_1;
    $add->Final_Value_1 = $request->fin_value_1;
    $add->Mfg_Date_1 = $request->mfg_1;
    $add->Exp_Date_1 = $request->exp_1;


    $add->Barcode_2 = $request->barcode_2;
    $add->Rate_2 = $request->rate_2;
    $add->Quantity_2 = $request->qty_2;
    $add->Total_2 = $request->total_2;
    $add->Dis_Percent_2 = $request->dis_percent_2;
    $add->Dis_Value_2 = $request->dis_value_2;
    $add->Final_Value_2 = $request->fin_value_2;
    $add->Mfg_Date_2 = $request->mfg_2;
    $add->Exp_Date_2 = $request->exp_2;

    $add->Barcode_3 = $request->barcode_3;
    $add->Rate_3 = $request->rate_3;
    $add->Quantity_3 = $request->qty_3;
    $add->Total_3 = $request->total_3;
    $add->Dis_Percent_3 = $request->dis_percent_3;
    $add->Dis_Value_3 = $request->dis_value_3;
    $add->Final_Value_3 = $request->fin_value_3;
    $add->Mfg_Date_3 = $request->mfg_3;
    $add->Exp_Date_3 = $request->exp_3;

    $add->Barcode_4 = $request->barcode_4;
    $add->Rate_4 = $request->rate_4;
    $add->Quantity_4 = $request->qty_4;
    $add->Total_4 = $request->total_4;
    $add->Dis_Percent_4 = $request->dis_percent_4;
    $add->Dis_Value_4 = $request->dis_value_4;
    $add->Final_Value_4 = $request->fin_value_4;
    $add->Mfg_Date_4 = $request->mfg_4;
    $add->Exp_Date_4 = $request->exp_4;


   
    $add->save();
    return redirect('/admin/product/list')->with("success", "Product Saved Successfully!");

  }

  function Destroy(Request $request, $id)
  {
    $deleteData = product::find($id);
    $deleteData->delete();

    return redirect('/admin/product/list')->with("success", "Product Deleted Successfully!");
  }

  function View(Request $request, $id)
  {
    $viewData = product::find($id);

    return view('admin\product\view', compact('viewData'));
  }

  function Edit(Request $request, $id)
  {
    $editData = product::find($id);
    $catData = category::all();
    $taxData = tax::all();
    $brandData = brand::all();
    return view('admin\product\edit', compact('catData', 'taxData', 'editData', 'brandData'));
  }

  function Update(Request $request)
  {
    $updateData = product::find($request->product_id);
    $updateData->Product_Name = $request->product_name;
    $updateData->HSN_Code = $request->hsn;
    $updateData->Product_Category = $request->p_cat;
    $updateData->Product_Brand = $request->p_brand;
    $updateData->Tax_Percent = $request->tax_percent;
    $updateData->Tax_Type = $request->tax_type;
    $updateData->Primary_Unit = $request->p_unit;
    $updateData->Alternate_Unit = $request->a_unit;
    $updateData->Conversion_Factor = $request->c_factor;
    $updateData->Barcode = $request->barcode;
    $updateData->Rate = $request->rate;
    $updateData->Quantity = $request->qty;
    $updateData->Total = $request->total;
    $updateData->Dis_Percent = $request->dis_percent;
    $updateData->Dis_Value = $request->dis_value;
    $updateData->Final_Value = $request->fin_value;
    $updateData->Mfg_Date = $request->mfg;
    $updateData->Exp_Date = $request->exp;

    $updateData->save();

    return redirect('/admin/product/list')->with("success", "Product Updated Successfully!");
  }
}
