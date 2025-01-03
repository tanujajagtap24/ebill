<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product_child;
use App\Models\product_master;
use App\Models\cart;
use App\Models\customer;
use Illuminate\Support\Facades\DB;

class Cart_Controller extends Controller
{
  function POS(Request $request)
  {

    $cartData = cart::all();
     $ProductMaster = product_master::all();
     $ProductChild = product_child::all();
     $total = cart::sum('total');
     $customerData = customer::all();
     return view('admin\pos', compact('customerData', 'ProductMaster', 'ProductChild', 'total', 'cartData'));
  }

    function Store(Request $request)
    {
      $p = $request->product_select;
      $ProductMaster = product_master::find($p);
      $ProductChild = product_child::find($p);
   
      $addpos = new cart();
      $addpos->Product_id = $request->product_select;
      $addpos->Product_Name = $ProductMaster->Product_Name;
      $addpos->Quantiy = $ProductChild->Quantity_1;
      $addpos->MRP = $ProductChild->Rate_1;
      $addpos->Sale_Price = $ProductChild->Dis_Value_1;
      $addpos->Total = $ProductChild->Final_Value_1;
      $addpos->save();
      return redirect('/admin/pos');
   }
   
   function Destroy(Request $request, $id)
     {
       $deleteData = cart::find($id);
       $deleteData->delete();
   
       return redirect('/admin/pos');
     }}
