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
        $billData = bill_list::find($id);
        // return $billData;
        $posMasterData = pos_master::find($billData->pos_master_id);
        // return $posMasterData;
        $posChildData = pos_child::where('pos_master_id', $posMasterData->id)->get();
        // return $posChildData;

        $customerData = customer::find($billData->customer_id);
        // return $customerData;
// 
        return view('admin\bill\view', compact('billData', 'customerData', 'posMasterData', 'posChildData'));

    }
}
