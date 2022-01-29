<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Referer;
use Illuminate\Http\Request;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Referitem;
use Carbon\Carbon;

class Referearn extends Controller
{
    public function Register(Request $request){
        if ($request->session()->has("USER_REFER")) {
            return redirect()->route("user.profile");

        }
        return view("frontend.refer.register");
    }

    public function Signup(Request $request){

    
        $request->validate([
            "phone"=>"required",
            "payment_method"=>"required"
        ]);



        $user_id = $request->session()->get("USER_ID");
        $phone = $request->input("phone");
        $payment_method = $request->input("payment_method");

      $refer_id =  Referer::insertGetId([
            "user_id"=> $user_id,
            "phone"=>$phone,
            "payment_method"=>$payment_method,
            'created_at' => Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        $request->session()->put("USER_REFER","yes");
        $request->session()->put("REFER_ID",$refer_id);

        
        $notification = array(
            'message' => 'Referer Account Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function ReferSave($id,$refer_id){
        $product = Product::findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        setcookie('product_id',$id,time()+60*60*24*5,"/");
        setcookie('refer_id',$refer_id,time()+60*60*24*5,"/");
		
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color','product_size','relatedProduct'));
    }

    public function UserInsights(){
        $refer_id = session("REFER_ID");
        $refers = Referitem::latest()->where("refer_id",$refer_id)->get();
        $due_payment = Referitem::where("refer_id",$refer_id)->where("status","unpaid")->sum("comission");
        $paid_payment = Referitem::where("refer_id",$refer_id)->where("status","paid")->sum("comission");
       $due_payment = 0;
        return view('frontend.profile.insights',compact('refers', 'due_payment','paid_payment'));   
    }

    public function UserPaymentDetails(){
        $refer_id = session("REFER_ID");
        $payment = Referer::where("id",$refer_id)->get();
        return view('frontend.profile.payment_details',compact('payment'));
    }

    public function UserPaymentUpdate(Request $request){
        $refer_id = session("REFER_ID");

        $payment_method = $request->input("payment_method");
        if ($payment_method == "paytm") {
            $paytm = $request->input("paytm");
            $update = array(
                "payment_method" => $payment_method,
                "paytm"=>$paytm
            );
            Referer::where("id",$refer_id)->update($update);

        }elseif ($payment_method == "bank_transfer") {
           $ac_no = $request->input("ac_no");
           $ifsc_code = $request->input("ifsc_code");
           $ac_name = $request->input("ac_name");
           $update = array(
            "payment_method" => $payment_method,
            "ac_no"=>$ac_no,
            "ifsc_code"=>$ifsc_code,
            "ac_name"=>$ac_name
        );
        Referer::where("id",$refer_id)->update($update);
        }elseif ($payment_method == "gpay") {
            $gpay = $request->input("gpay");
            $update = array(
                "gpay"=>$gpay,
                "payment_method"=>$payment_method
            );
            Referer::where("id",$refer_id)->update($update);
        }

        $notification = array(
            'message' => 'Payment Details Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.refer.payment')->with($notification);
    }

    public function ReferShare(){
        $refer_id = session("REFER_ID");
        return view("frontend.profile.refer_share", compact("refer_id"));
    }

}
