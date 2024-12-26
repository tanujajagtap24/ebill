<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\category;
use App\Models\tax;
use Illuminate\Http\Request\DB;
use Illuminate\Http\Request;

class Product_Controller extends Controller
{
    function Create(Request $request)
    {
        $catData = category::all();
        $taxData = tax::all();
        return view('admin\product\create', compact('catData', 'taxData'));
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
        $add->Product_Category = $request->product_cat;
        $add->Quantity = $request->qty;
        $add->Rate = $request->rate;
        $add->Total = $request->total;
        $add->Dis_Percent = $request->dis_percent;
        $add->Dis_Value = $request->dis_value;
        $add->Tax_Percent = $request->tax_percent;
        $add->Final_Value = $request->fin_value;
        $add->save();
        return redirect('/admin/product/list')->with("success", "Product Saved Successfully!");

    }

    function Destroy(Request $request,$id)
    {
      $deleteData=product::find($id);
      $deleteData->delete();

      return redirect('/admin/product/list')->with("success", "Product Deleted Successfully!");
    }

    function View(Request $request, $id)
    {
       $viewData=product::find($id);

      return view('admin\product\view',compact('viewData'));
    }

    function Edit(Request $request, $id)
    {
        $editData = product::find($id);
        $catData = category::all();
        $taxData = tax::all();
        return view('admin\product\create', compact('catData', 'taxData','editData')); 
    }

    function Update(Request $request)
    {
      $updateData=product::find($request->product_id);
      $updateData->Product_Name = $request->product_name;
      $updateData->Product_Category = $request->product_cat;
      $updateData->Quantity = $request->qty;
      $updateData->Rate = $request->rate;
      $updateData->Total = $request->total;
      $updateData->Dis_Percent = $request->dis_percent;
      $updateData->Dis_Value = $request->dis_value;
      $updateData->Tax_Percent = $request->tax_percent;
      $updateData->Final_Value = $request->fin_value;
      $updateData->save();

      return redirect('/admin/product/list')->with("success", "Product Updated Successfully!");
    }
}
