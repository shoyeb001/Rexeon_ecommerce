<?php

namespace App\Http\Controllers;

use App\Models\Pickupcenter as ModelsPickupcenter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Pickupcenter extends Controller
{
    public function ViewPickUpCenter(){
        $center = ModelsPickupcenter::get();
        return view("backend.center.view", compact('center'));
    }

    public function AddPickUpCenter(Request $request){
        $request->validate([
            "name"=>"required",
            "address"=>"required",
            "phone"=>"required"
        ]);

        ModelsPickupcenter::insert([
            "name" => $request->input("name"),
            "address"=>$request->input("address"),
            "phone"=>$request->input("phone"),
            "created_at"=>Carbon::now()
        ]);

        $notification = array(
            'message' => 'Pickup Center added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route("pickupcenter.view")->with($notification);

    }

    public function EditPickUpCenter($id){
        $centers = ModelsPickupcenter::where("id",$id)->get();
        return view("backend.center.edit",compact('centers'));
    }

    public function UpdatePickUpCenter(Request $request){
        $request->validate([
            "name"=>"required",
            "address"=>"required",
            "phone"=>"required"
        ]);

        $id = $request->input("id");
        $data = array(
            "name"=>$request->input("name"),
            "address"=>$request->input("address"),
            "phone"=>$request->input("phone")
        );

        ModelsPickupcenter::where("id",$id)->update($data);

        $notification = array(
            "message"=>"Pickup Center updated successfully",
            "alert-type"=>"success"
        );

        return redirect()->route("pickupcenter.view")->with($notification);
    }

    public function DeletePickUpCenter($id){
        ModelsPickupcenter::where("id",$id)->delete();
        $notification = array(
            "message"=>"Pickup Center Deleted Successfully",
            "alert-type"=>"success"
        );

        return redirect()->route("pickupcenter.view")->with($notification);

    }


}
