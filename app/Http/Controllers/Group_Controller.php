<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\group;
use Illuminate\Support\Facades\DB;
class Group_Controller extends Controller
{
   function Create(Request $request)
   {
    return view('admin\group\create');

   }

   function List(Request $request)
   {
    $GroupData=group::all();
    return view('admin\group\list',compact('GroupData'));


   }

   function Store(Request $request)
   {
    $add =new group;
    $add->Group_Name=$request->grp_name;
    $add->save();
     return redirect('/admin/group/list')->with('success',"Group Saved Successfully!");
   }

   function Destroy(Request $request,$id)
   {
    $deleteData= group::find($id);
    $deleteData->delete();
    return redirect('/admin/group/list')->with('success',"Group delete Successfully");

   }

   function View(Request $request,$id)
   {
    $viewData= group::find($id);
    return view('admin\group\view',compact('viewData'));

   }

   function Edit(Request $request,$id)
   {
    $editData= group::find($id);
    return view('admin\group\edit',compact('editData'));
   }

   function Update(Request $request)
   {
    $update =group::find($request->grp_id);
    $update->Group_Name=$request->grp_name;
    $update->save();
    return redirect('/admin/group/list')->with('success',"Group Updated Successfully");
   }
}
