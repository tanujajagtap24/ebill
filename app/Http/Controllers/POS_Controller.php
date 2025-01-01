<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product_child;
use App\Models\product_master;
use Illuminate\Support\Facades\DB;

class POS_Controller extends Controller
{
 function POS_Customer(Request $request)
 {
    $ProductMaster = product_master::all();
    $ProductChild = product_child::all();
    $total = product_child::sum('Final_Value_1');
    $customerData = customer::all();
    return view('admin\pos', compact('customerData', 'ProductMaster', 'ProductChild', 'total'));
 }


}
