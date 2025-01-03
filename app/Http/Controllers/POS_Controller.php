<?php

namespace App\Http\Controllers;
use App\Models\pos_child;
use App\Models\pos_master;
use App\Models\cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class POS_Controller extends Controller
{
    function Store(Request $request)
    {
        $total = cart::sum('total');
        $product_id = $request->p_id;
        $cartData = cart::where('Product_id', $product_id)->get();
        $addposmaster = new pos_master();
        $addposmaster->Customer_id = $request->cust_id;
        $addposmaster->Payment_Term=$request->pay_term;
        $addposmaster->Total=$request->total_amt;
        $addposmaster->Bill_Date=$request->bill_date;
        // return $addposmaster;
        $addposmaster->save();

        $addposchild = new pos_child();
        $addposchild->pos_master_id=$addposmaster->id;
        $addposchild->Product_id=$product_id;
        $addposchild->Sale_Price=$request->sale;
        $addposchild->Quantity=$request->qty;
        $addposchild->Total=$request->total;
        $addposchild->save();
        return $addposchild;

        //  return redirect('/admin/bill')->with("success", "Product Saved Successfully!");

    }
}
