<?php

namespace App\Http\Controllers;
use App\Models\product_master;
use App\Models\product_child;
use App\Models\category;
use App\Models\tax;
use App\Models\brand;
use App\Models\product;
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
    $childData = product_child::all();
    $masterData = product_master::all();
    return view('admin\product\list', compact('childData', 'masterData'));
  }

  function Store(Request $request)
  {
    $addMaster = new product_master();

    $addMaster->Product_Name = $request->product_name;
    $addMaster->HSN_Code = $request->hsn;
    $addMaster->Product_Category = $request->p_cat;
    $addMaster->Product_Brand = $request->p_brand;
    $addMaster->Tax_Percent = $request->tax_percent;
    $addMaster->Tax_Type = $request->tax_type;
    $addMaster->Primary_Unit = $request->p_unit;
    $addMaster->Alternate_Unit = $request->a_unit;
    $addMaster->Conversion_Factor = $request->c_factor;
    $addMaster->save();

    $addChild = new product_child();
    $addChild->product_master_id = $addMaster->id;
    $addChild->Barcode_1 = $request->barcode_1;
    $addChild->Rate_1 = $request->rate_1;
    $addChild->Quantity_1 = $request->qty_1;
    $addChild->Total_1 = $request->total_1;
    $addChild->Dis_Percent_1 = $request->dis_percent_1;
    $addChild->Dis_Value_1 = $request->dis_value_1;
    $addChild->Final_Value_1 = $request->fin_value_1;
    $addChild->Mfg_Date_1 = $request->mfg_1;
    $addChild->Exp_Date_1 = $request->exp_1;

    $addChild->Barcode_2 = $request->barcode_2;
    $addChild->Rate_2 = $request->rate_2;
    $addChild->Quantity_2 = $request->qty_2;
    $addChild->Total_2 = $request->total_2;
    $addChild->Dis_Percent_2 = $request->dis_percent_2;
    $addChild->Dis_Value_2 = $request->dis_value_2;
    $addChild->Final_Value_2 = $request->fin_value_2;
    $addChild->Mfg_Date_2 = $request->mfg_2;
    $addChild->Exp_Date_2 = $request->exp_2;

    $addChild->Barcode_3 = $request->barcode_3;
    $addChild->Rate_3 = $request->rate_3;
    $addChild->Quantity_3 = $request->qty_3;
    $addChild->Total_3 = $request->total_3;
    $addChild->Dis_Percent_3 = $request->dis_percent_3;
    $addChild->Dis_Value_3 = $request->dis_value_3;
    $addChild->Final_Value_3 = $request->fin_value_3;
    $addChild->Mfg_Date_3 = $request->mfg_3;
    $addChild->Exp_Date_3 = $request->exp_3;

    $addChild->Barcode_4 = $request->barcode_4;
    $addChild->Rate_4 = $request->rate_4;
    $addChild->Quantity_4 = $request->qty_4;
    $addChild->Total_4 = $request->total_4;
    $addChild->Dis_Percent_4 = $request->dis_percent_4;
    $addChild->Dis_Value_4 = $request->dis_value_4;
    $addChild->Final_Value_4 = $request->fin_value_4;
    $addChild->Mfg_Date_4 = $request->mfg_4;
    $addChild->Exp_Date_4 = $request->exp_4;


    $addChild->save();
    return redirect('/admin/product/list')->with("success", "Product Saved Successfully!");

  }

  function Destroy(Request $request, $id)
  {
    $deleteData = product_master::find($id);
    $deleteData->delete();

    return redirect('/admin/product/list')->with("success", "Product Deleted Successfully!");
  }

  function View(Request $request, $id)
  {
    $viewData = product_master::find($id);

    return view('admin\product\view', compact('viewData'));
  }

  function Edit(Request $request, $id)
  {
    $masterData = product_master::find($id);    
    $childData = product_child::find($id);
    $catData = category::all();
    $taxData = tax::all();
    $brandData = brand::all();
    return view('admin\product\edit', compact('masterData', 'childData', 'catData', 'taxData', 'brandData'));
  }

  function Update(Request $request)
  {
    {
      $updateMaster = product_master::find($request->product_id);

      $updateMaster->Product_Name = $request->product_name;
      $updateMaster->HSN_Code = $request->hsn;
      $updateMaster->Product_Category = $request->p_cat;
      $updateMaster->Product_Brand = $request->p_brand;
      $updateMaster->Tax_Percent = $request->tax_percent;
      $updateMaster->Tax_Type = $request->tax_type;
      $updateMaster->Primary_Unit = $request->p_unit;
      $updateMaster->Alternate_Unit = $request->a_unit;
      $updateMaster->Conversion_Factor = $request->c_factor;
      $updateMaster->save();
  
      $updateChild = product_child::find($request->product_master_id);

      $updateChild->Barcode_1 = $request->barcode_1;
      $updateChild->Rate_1 = $request->rate_1;
      $updateChild->Quantity_1 = $request->qty_1;
      $updateChild->Total_1 = $request->total_1;
      $updateChild->Dis_Percent_1 = $request->dis_percent_1;
      $updateChild->Dis_Value_1 = $request->dis_value_1;
      $updateChild->Final_Value_1 = $request->fin_value_1;
      $updateChild->Mfg_Date_1 = $request->mfg_1;
      $updateChild->Exp_Date_1 = $request->exp_1;
  
      $updateChild->Barcode_2 = $request->barcode_2;
      $updateChild->Rate_2 = $request->rate_2;
      $updateChild->Quantity_2 = $request->qty_2;
      $updateChild->Total_2 = $request->total_2;
      $updateChild->Dis_Percent_2 = $request->dis_percent_2;
      $updateChild->Dis_Value_2 = $request->dis_value_2;
      $updateChild->Final_Value_2 = $request->fin_value_2;
      $updateChild->Mfg_Date_2 = $request->mfg_2;
      $updateChild->Exp_Date_2 = $request->exp_2;
  
      $updateChild->Barcode_3 = $request->barcode_3;
      $updateChild->Rate_3 = $request->rate_3;
      $updateChild->Quantity_3 = $request->qty_3;
      $updateChild->Total_3 = $request->total_3;
      $updateChild->Dis_Percent_3 = $request->dis_percent_3;
      $updateChild->Dis_Value_3 = $request->dis_value_3;
      $updateChild->Final_Value_3 = $request->fin_value_3;
      $updateChild->Mfg_Date_3 = $request->mfg_3;
      $updateChild->Exp_Date_3 = $request->exp_3;
  
      $updateChild->Barcode_4 = $request->barcode_4;
      $updateChild->Rate_4 = $request->rate_4;
      $updateChild->Quantity_4 = $request->qty_4;
      $updateChild->Total_4 = $request->total_4;
      $updateChild->Dis_Percent_4 = $request->dis_percent_4;
      $updateChild->Dis_Value_4 = $request->dis_value_4;
      $updateChild->Final_Value_4 = $request->fin_value_4;
      $updateChild->Mfg_Date_4 = $request->mfg_4;
      $updateChild->Exp_Date_4 = $request->exp_4;
  
      $updateChild->save();
      return redirect('/admin/product/list')->with("success", "Product Updated Successfully!");
  
    }
    $updateData->save();

    return redirect('/admin/product/list')->with("success", "Product Updated Successfully!");
  }
}
