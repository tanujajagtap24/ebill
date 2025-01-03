<?php

namespace App\Http\Controllers;
use App\Models\pos_child;
use App\Models\pos_master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class POS_Controller extends Controller
{
    function Store(Request $request)
    {
        $addposmaster = new pos_master();

        $addposmaster->Customer_id=$request;
        $addposmaster->Payment_Term=$request;
        $addposmaster->Total=$request;
        $addposmaster->Bill_Date=$request;
        $addposmaster->save();

        $addposchild = new pos_child();
        $addposchild->pos_master_id=$request;
        $addposchild->Product_id=$request;
        $addposchild->Sale_Price=$request;
        $addposchild->Quantity=$request;
        $addposchild->Total=$request;
        $addposchild->save();

         return redirect('/admin/bill')->with("success", "Product Saved Successfully!");

    }
}
