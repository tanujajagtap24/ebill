<?php

namespace App\Http\Controllers;
use App\Models\bill_list;
use App\Models\customer;
use App\Models\pos_child;
use App\Models\pos_master;
use App\Models\cart;
use App\Models\product_master;
use App\Models\product_child;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Bill_Controller extends Controller
{
    function List(Request $request)
    {
        $posMasterData = pos_master::all();
        $customerData = customer::all();
        $billData = bill_list::all();
        return view('admin\bill\list', compact('billData', 'customerData', 'posMasterData'));
    }

    function Edit(Request $request, $id)
    {
       $editbill = bill_list::find($id);
       //return $editbill;
       $bill_master_id = $editbill->pos_master_id;
       $editPOSmaster = pos_master::find($bill_master_id);
       $editPOSchild = pos_child::where('pos_master_id', $editPOSmaster->id)->get();
       $editCustomer = customer::find($editbill->customer_id);
       $customerData = customer::all();
       $ProductMaster = product_master::all();
       $ProductChild = product_child::all();       
              
       foreach($editPOSchild as $child)
       {
       $addCart = new cart();
       $addCart->Product_id = $child->Product_id;
       $addCart->Product_Name = $child->Product_Name;
       $addCart->Quantiy = $child->Quantity;
       $addCart->MRP = $child->MRP;
       $addCart->Total = ($child->MRP)*($child->Quantity);
       $addCart->Sale_Price = $child->Sale_Price;
       $addCart->FinalAmount = $child->Total;
       $addCart->save();
       }   

       $cartData = cart::all();
       cart::truncate();
    return view('admin\edit_pos', compact('editbill', 'editPOSmaster', 'editPOSchild', 'editCustomer', 'customerData', 'ProductMaster', 'ProductChild', 'cartData'));
    }



    function View(Request $request)
    {
        $id = $request->id;
        $viewbill = bill_list::find($id);
        // return $billData;
        $viewPosMaster = pos_master::find($viewbill->pos_master_id);
        $saving = ($viewPosMaster->Total)-($viewPosMaster->Final_Amount);
        // return $posMasterData;
        $viewPosChild = pos_child::where('pos_master_id', $viewPosMaster->id)->get();
        // return $posChildData;

        $viewCustomer = customer::find($viewbill->customer_id);
        // return $customerData;
// 
        return view('admin\bill\view', compact('viewbill', 'viewCustomer', 'viewPosMaster', 'viewPosChild', 'saving'));

    }
}
