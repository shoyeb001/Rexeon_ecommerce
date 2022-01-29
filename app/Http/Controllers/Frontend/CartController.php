<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon; 
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Wishlist;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    } // end mehtod 

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);
    }
    
    public function CreateCheckout(){
        if (Cart::total() > 0) {

            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal'));
        } else {

            $notification = array(
                'message' => 'Shopping At list One Product',
                'alert-type' => 'error'
            );

            return redirect()->to('/')->with($notification);
        }
    }

    public function AddToWishlist(Request $request, $product_id)
    {

        if ($request->session()->has("USER_ID")) {

            $exists = Wishlist::where('user_id', session("USER_ID"))->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => session("USER_ID"),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }
        } else {

            return response()->json(['error' => 'At First Login Your Account']);
        }
    } // end method 

}
