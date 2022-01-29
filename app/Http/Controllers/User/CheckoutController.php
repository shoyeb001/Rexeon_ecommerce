<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request){
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division'] = $request->division;
    	$data['district'] = $request->district;
    	$data['state'] = $request->state;
    	$data['notes'] = $request->notes;
		$data['pickup_center'] = $request->pickup_center;
    	$cartTotal = Cart::total();


    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'card') {
    		return view('frontend.payment.stripe',compact('data','cartTotal'));
    	}else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
    	}
    }
}
