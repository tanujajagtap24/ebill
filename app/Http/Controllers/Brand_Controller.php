<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use\App\Models\brand;


class Brand_Controller extends Controller
{
    function List(Request $request)
    {
        $BrandData = brand::all();
        return view('admin\brand\list', compact('BrandData'));
    }
    function Create(Request $request)
    {
        return view('admin\brand\create');
    }

    function Store(Request $request)
    {
        $add = new brand();
        $add->Brand_Name = $request->brand_name;
        $add->save();

        return redirect('/admin/brand/list')->with("success", "Brand Saved Successfully!");
    }

    function Destroy(Request $request, $id)
    {
        $deleteData = brand::find($id);
        $deleteData->delete();

        return redirect('/admin/brand/list')->with("success", "Brand Deleted Successfully!");
    }

    function View(Request $request, $id)
    {
        $viewData = brand::find($id);
        return view('admin\brand\view', compact("viewData"));
    }

    function Edit(Request $request, $id)
    {
        $editData = brand::find($id);
        return view('admin\brand\edit', compact("editData"));
    }

    function Update(Request $request)
    {
        $updateData = brand::find($request->brand_id);
        $updateData->Brand_Name = $request->brand_name;
        $updateData->save();
        return redirect('/admin/brand/list')->with("success", "Brand Updated Successfully!");
    }
}
