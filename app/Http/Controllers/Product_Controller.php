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
    $add->Barcode = $request->barcode;
    $add->Rate = $request->rate;
    $add->Quantity = $request->qty;
    $add->Total = $request->total;
    $add->Dis_Percent = $request->dis_percent;
    $add->Dis_Value = $request->dis_value;
    $add->Final_Value = $request->fin_value;
    $add->Mfg_Date = $request->mfg;
    $add->Exp_Date = $request->exp;
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
