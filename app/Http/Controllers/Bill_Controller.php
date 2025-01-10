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

    function Edit(Request $request)
    {
       $editbill = bill_list::find($request->id);
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


    function CartStore(Request $request)
    {
      $p = $request->product_select;
      $ProductMaster = product_master::find($p);
      $ProductChild = product_child::find($p);
   
      $addpos = new cart();
      $addpos->Product_id = $request->product_select;
      $addpos->Product_Name = $ProductMaster->Product_Name;
      $addpos->Quantiy = $ProductChild->Quantity_1;
      $addpos->MRP = $ProductChild->Rate_1;
      $addpos->Total = $ProductChild->Total_1;
      $addpos->Sale_Price = $ProductChild->Dis_Value_1;
      $addpos->FinalAmount = $ProductChild->Final_Value_1;
      $addpos->save();
      
      $cart = cart::all();
      return $cart;
    }


    function Update(Request $request)
    {
        $total = cart::sum('total');
        $Qty = cart::count('id');
        $Final = cart::sum('FinalAmount');
        $product_id = $request->p_id;
        $cartData = cart::where('Product_id', $product_id)->get();
        $addposmaster = pos_master::find($request->p_master_id);
        $addposmaster->Customer_id = $request->cust_id;
        $addposmaster->Payment_Term=$request->pay_term;
        $addposmaster->Quantity = $Qty;
        $addposmaster->Total=$total;
        $addposmaster->Final_Amount=$Final;
        $addposmaster->Bill_Date=$request->bill_date;
        // return $addposmaster;
        $addposmaster->save();

        $addBill = bill_list::find($request->bill_id);
        $addBill->pos_master_id =  $addposmaster->id;
        $addBill->customer_id = $addposmaster->Customer_id;
        $addBill->bill_date = $addposmaster->Bill_Date;
        $addBill->total = $addposmaster->Total;
        $addBill->save();

        $cartData = cart::all();
        foreach($cartData as $data){
        $addposchild = new pos_child();
        $addposchild->pos_master_id=$addposmaster->id;
        $addposchild->Product_id= $data->Product_id;
        $addposchild->Product_Name= $data->Product_Name;
        $addposchild->MRP=$data->MRP;
        $addposchild->Sale_Price=$data->Sale_Price;
        $addposchild->Quantity=$data->Quantiy;
        $addposchild->Total=$data->FinalAmount;
        $addposchild->save();
        }
        cart::truncate();
         return redirect('/admin/bill/list')->with('success', 'Bill Updated Successfully');
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
