<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use stripe;
use App\Models\Referitem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Referer;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class StripeController extends Controller
{
	public function StripeOrder(Request $request)
	{
		/* if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{*/
		$total_amount = round(Cart::total());

		//}

		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


		$token = $_POST['stripeToken'];
		$charge = \Stripe\Charge::create([
			'amount' => $total_amount * 100,
			'currency' => 'inr',
			'description' => 'Easy Online Store',
			'source' => $token,
			'metadata' => ['order_id' => uniqid()],
		]);
		// dd($charge);

		$order_id = Order::insertGetId([
			'user_id' => session("USER_ID"),
			'division' => $request->division,
			'district' => $request->district,
			'state' => $request->state,
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'post_code' => $request->post_code,
			'notes' => $request->notes,
			"pickup_center"=>$request->pickup_center,

			'payment_type' => 'Stripe',
			'payment_method' => 'Stripe',
			'payment_type' => $charge->payment_method,
			'transaction_id' => $charge->balance_transaction,
			'currency' => $charge->currency,
			'amount' => $total_amount,
			'order_number' => $charge->metadata->order_id,

			'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
			'order_date' => Carbon::now()->format('d F Y'),
			'order_month' => Carbon::now()->format('F'),
			'order_year' => Carbon::now()->format('Y'),
			'status' => 'pending',
			'created_at' => Carbon::now(),

		]);

		// Start Send Email 
		$invoice = Order::findOrFail($order_id);
		$data = [
			'invoice_no' => $invoice->invoice_no,
			'amount' => $total_amount,
			'name' => $invoice->name,
			'email' => $invoice->email,
		];

		Mail::to($request->email)->send(new OrderMail($data));

		// End Send Email 


		$carts = Cart::content();
		foreach ($carts as $cart) {
			$p_id = $cart->id;
			$p_qty = $cart->qty;
			$p_price = $cart->price;

			OrderItem::insert([
				'order_id' => $order_id,
				'product_id' => $cart->id,
				'color' => $cart->options->color,
				'size' => $cart->options->size,
				'qty' => $p_qty,
				'price' => $p_price,
				'created_at' => Carbon::now(),

			]);
		}


		/* if (Session::has('coupon')) {
     	Session::forget('coupon');
     }*/

		$user_id = session("USER_ID");
		$user = User::where("id", $user_id)->get();
		if ($user[0]->is_buyer == "no") {
			$data = array(
				"is_buyer" => "yes"
			);
			$request->session()->put("IS_BUYER", "yes");
			User::where("id", $user_id)->update($data);
		}

		if ($user[0]->referer_id != NULL) {
			$referer_id1 = $user[0]->referer_id;
           
			$referer1 = Referer::where("id",$referer_id1)->get();
			$user1 = User::where("id",$referer1[0]->user_id)->get();

			Referitem::Insert([
				"refer_id" => $referer_id1,
				"comission"=> ($total_amount/ 100) * 4,
                "status"=> "unpaid",
				"created_at"=>Carbon::now(),
			]);

			if ($user1[0]->referer_id !=NULL) {
				$referer_id2 = $user1[0]->referer_id;
           
				$referer2 = Referer::where("id",$referer_id2)->get();
				$user2 = User::where("id",$referer2[0]->user_id)->get();
	
				Referitem::Insert([
					"refer_id" => $referer_id2,
					"comission"=> ($total_amount/ 100) * 3,
					"status"=> "unpaid",
					"created_at"=>Carbon::now(),
				]);

				if ($user2[0]->referer_id != NULL) {
					$referer_id3 = $user2[0]->referer_id;
           		
					Referitem::Insert([
						"refer_id" => $referer_id3,
						"comission"=> ($total_amount/ 100) * 2,
						"status"=> "unpaid",
						"created_at"=>Carbon::now(),
					]);
				} // label 3 user

			} //label 2 user

		}//lebel 1 user

		Cart::destroy();




		$notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('frontend.index')->with($notification);
	} // end method 

}
