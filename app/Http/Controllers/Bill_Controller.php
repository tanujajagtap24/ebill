<?php

namespace App\Http\Controllers;
use App\Models\bill_list;
use App\Models\customer;
use App\Models\pos_child;
use App\Models\pos_master;
use App\Models\cart;
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

    function View(Request $request, $id)
    {
        $viewbill = bill_list::find($id);
        // return $billData;
        $viewPosMaster = pos_master::find($viewbill->pos_master_id);
        // return $posMasterData;
        $viewPosChild = pos_child::where('pos_master_id', $viewPosMaster->id)->get();
        // return $posChildData;

        $viewCustomer = customer::find($viewbill->customer_id);
        // return $customerData;
// 
        return view('admin\bill\view', compact('viewbill', 'viewCustomer', 'viewPosMaster', 'viewPosChild'));

    }
}
