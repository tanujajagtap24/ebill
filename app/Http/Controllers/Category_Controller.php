<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;

class Category_Controller extends Controller
{
    function List(Request $request)
    {
        $CategoryData = category::all();
        return view('admin\category\list', compact('CategoryData'));
    }
    function Create(Request $request)
    {
        return view('admin\category\create');
    }

    function Store(Request $request)
    {
        $add = new category();
        $add->Category_Name = $request->cat_name;
        $add->save();

        return redirect('/admin/category/list')->with("success", "Category Saved Successfully!");
    }

    function Destroy(Request $request, $id)
    {
        $deleteData = category::find($id);
        $deleteData->delete();

        return redirect('/admin/category/list')->with("success", "Category Deleted Successfully!");
    }

    function View(Request $request, $id)
    {
        $viewData = category::find($id);
        return view('admin\category\view', compact("viewData"));
    }

    function Edit(Request $request, $id)
    {
        $editData = category::find($id);
        return view('admin\category\edit', compact("editData"));
    }

    function Update(Request $request)
    {
        $updateData = category::find($request->cat_id);
        $updateData->Category_Name = $request->cat_name;
        $updateData->save();
        return redirect('/admin/category/list')->with("success", "Category Updated Successfully!");
    }

}
