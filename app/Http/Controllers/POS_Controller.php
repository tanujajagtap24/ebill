<?php

namespace App\Http\Controllers;
use App\Models\pos_child;
use App\Models\pos_master;
use App\Models\cart;
use App\Models\bill_list;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class POS_Controller extends Controller
{
    function Store(Request $request)
    {
        $total = cart::sum('total');
        $Qty = cart::count('id');
        $product_id = $request->p_id;
        $cartData = cart::where('Product_id', $product_id)->get();
        $addposmaster = new pos_master();
        $addposmaster->Customer_id = $request->cust_id;
        $addposmaster->Payment_Term=$request->pay_term;
        $addposmaster->Quantity = $Qty;
        $addposmaster->Total=$total;
        $addposmaster->Final_Amount=$request->total_amt;
        $addposmaster->Bill_Date=$request->bill_date;
        // return $addposmaster;
        $addposmaster->save();

        $addBill = new bill_list();
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
        $addposchild->Total=$data->Total;
        $addposchild->save();
        }
        cart::truncate();
         return redirect('/admin/pos')->with("success", "Bill Saved Successfully!");
    }
}
