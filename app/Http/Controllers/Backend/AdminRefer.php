<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Referer;
use App\Models\Referitem;
use Illuminate\Http\Request;

class AdminRefer extends Controller
{
    public function ViewRefers(){
        $refers = Referitem::latest()->get();
        return view('backend.refer.refer_view',compact('refers'));
    }

    public function ViewDuePayment(){
        $refers = Referer::get();
        return view("backend.refer.payment_view",compact("refers"));
        
    }

    public function ViewPaymentDetails($user_id){
        $refers = Referer::where("user_id",$user_id)->get();
        $referdetails = Referitem::where("refer_id",$refers[0]->id)->where("status","unpaid")->get();
        return view("backend.refer.payment_details",compact("refers","referdetails"));
    }

    public function CompletePayment($refer_id){
        $data = array(
            "status"=>"paid"
        );

        Referitem::where("refer_id",$refer_id)->where("status","unpaid")->update($data);

            
        $notification = array(
            'message' => 'Payment status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.due.payment')->with($notification);
    }
}
