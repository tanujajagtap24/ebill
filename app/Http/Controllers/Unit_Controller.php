<?php

namespace App\Http\Controllers;
use \App\Models\unit;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Unit_Controller extends Controller
{
    function Create(Request $request)
    {
        return view('admin\unit\create');

    }

    function List(Request $request)
    {
        $UnitData=unit::all();
        return view('admin\unit\list',compact('UnitData'));

    }

    function Store(Request $request)
    {
        $add= new unit;
        $add->Unit_Name=$request->unit_nm;
        $add->save();

    return redirect('/admin/unit/list')->with('success',"Unit store successfully!");
    }

    function Destroy(Request $request,$id)
    {
        $deleteData=unit::find($id);
        $deleteData->delete();
        return redirect('/admin/unit/list')->with('success',"Unit Deleted Successfully!");


    }

    function View(Request $request, $id)
    {
        $viewData=unit::find($id);
        return view('admin\unit\view',compact('viewData'));

    }

    function Edit(Request $request, $id)
    {
        $editData=unit::find($id);
        return view('admin\unit\edit',compact('editData'));
    }

    function Update(Request $request)
    {
        $updateData=unit::find($request->unit_id);
        $updateData->Unit_Name = $request->unit_name;
        $updateData->save();
        return redirect('/admin/unit/list')->with('success',"Unit Updated Successfully!");
    }
}
