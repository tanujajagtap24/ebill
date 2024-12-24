<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use \App\Models\city;
use Illuminate\Support\Facades\DB;

class City_Controller extends Controller
{
    Function List(Request $request)
    {
        $CityData=city::all();
        return view('admin\city\list',compact('CityData'));
    }
    Function Create(Request $request)
    {
    return view('admin\city\create');

    }

    function Store(Request $request)
    {
        $cities= new city;
        $cities->city_Name=$request->city_name;
        $cities->Pin_Code=$request->city_pin;
        $cities->save();
        return redirect('/admin/city/list')->with('Success',"city saved sucessful");
    }
     function Destroy(Request $request, $id)
     {
        $deleteData=city::find($id);
        $deleteData->delete();
        return redirect('/admin/city/list')->with("success", "Category Deleted Successfully!");

     }

     function View(Request $request, $id)
     {
        $viewData=city::find($id);
        return view('admin\city\view', compact("viewData"));
       
     }

     function Edit(Request $request ,$id)
     {
        $editdata=city::find($id);
        return view('admin/city/edit',compact('editdata'));
     }

     function Update(Request $request)
     {
        $updateData = city::find($request->city_id);
        $updateData->city_Name = $request->city_name;
        $updateData->Pin_Code = $request->pincode;
        $updateData->save();
        return redirect('/admin/city/list')->with("success", "City Updated Successfully!");
     }
}
