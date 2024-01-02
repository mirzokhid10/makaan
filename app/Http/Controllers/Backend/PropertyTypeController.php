<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    // AllType
    public function AllType(){

        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } // End Method

    // AddType
    public function AddType(){
        return view('backend.type.add_type');
    } // End Method

    // StoreType
    public function StoreType(Request $request){
        // Validation
        $request->validate([
           'type_name' => 'required|unique:property_types|max:200',
           'type_icon' => 'required'
        ]);
        PropertyType::insert([
           'type_name' => $request->type_name,
           'type_icon' => $request->type_icon,
        ]);

        $notification = array(
           'message' => 'Property Type Create Successfully',
           'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }// End Method

    // EditType
    public function EditType($id){

        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    }// End Method

    // UpdateType
    public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([

            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }// End Method

    // DeleteType
    public function DeleteType($id){

        PropertyType::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// DeleteType End Method
}
