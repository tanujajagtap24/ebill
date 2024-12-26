<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customer;
use App\Models\city;
use App\Models\group;



class Customer_Controller extends Controller
{
    function List(Request $request)
    {
        $CustomerData = customer::all();
        return view('admin\customer\list', compact('CustomerData'));
    }
    function Create(Request $request)
    {
        $groupData = group::all();
        $cityData = city::all();
        return view('admin\customer\create', compact('cityData', 'groupData'));
    }

    function Store(Request $request)
    {
        $add = new customer();
        $add->Customer_Name = $request->cust_name;
        $add->City = $request->cust_city;
        $add->Pincode = $request->cust_pin;
        $add->Mobile_Number = $request->mob;
        $add->Email = $request->mail;
        $add->Address = $request->address;
        $add->Group = $request->cust_grp;
        $add->save();
        return redirect('/admin/customer/list')->with("success", "Customer Saved Successfully!");
    }

    function Destroy(Request $request, $id)
    {
        $deleteData = customer::find($id);
        $deleteData->delete();

        return redirect('/admin/customer/list')->with("success", "Customer Deleted Successfully!");
    }

    function View(Request $request, $id)
    {
        $viewData = customer::find($id);
        return view('admin\customer\view', compact("viewData"));
    }

    function Edit(Request $request, $id)
    {       
        $editData = customer::find($id);
        $groupData = group::all();
        $cityData = city::all();
        return view('admin\customer\edit', compact('editData', 'cityData', 'groupData'));
    }

    function Update(Request $request)
    {
        $updateData = customer::find($request->cust_id);
        $updateData->Customer_Name = $request->cust_name;
        $updateData->City = $request->cust_city;
        $updateData->Pincode = $request->cust_pin;
        $updateData->Mobile_Number = $request->mob;
        $updateData->Email = $request->mail;
        $updateData->Address = $request->address;
        $updateData->Group = $request->cust_grp;
        // return $updateData;
        $updateData->save();
        return redirect('/admin/customer/list')->with("success", "Customer Updated Successfully!");

    }
}
