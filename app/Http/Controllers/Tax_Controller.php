<?php

namespace App\Http\Controllers;
use \App\Models\tax;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Tax_Controller extends Controller
{
    function create(Request $request)
    {
        return view('admin\tax\create');

    }

    function List(Request $request)
    {
        $taxData=tax::all();
        return view('admin\tax\list',compact('taxData'));
    }

    function Store(Request $request )
    {
        $add=new tax;
        $add->Tax_Percentage=$request->tax_percent;
        $add->save();
        return redirect('/admin/tax/list')->with("success", "Tax Saved Successfully!");
    }

    function Destroy(Request $request ,$id)
    {
        $deleteData =tax::find($id);
        $deleteData->delete();
        return redirect('/admin/tax/list')->with("success","tax delete succesfully");


    }

    function  view(Request $request,$id)
    {
        $viewData = tax::find($id);
       return view('admin\tax\view',compact('viewData'));

    }

    function Edit(Request $request,$id)
    {
        $editdata =tax::find($id);
        return view('admin\tax\edit',compact('editdata'));

        
    }

    function Update(Request $request)
    {
        $updateData=tax::find($request->tax_id);
        $updateData->Tax_Percentage = $request->tax_percent;
        $updateData->save();
        return redirect('/admin/tax/list')->with('success',"Tax Updated Sucessfully");
    }
}
