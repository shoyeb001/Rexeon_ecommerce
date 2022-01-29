<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',session("USER_ID"))->latest()->get();
		return response()->json($wishlist);
    }

    public function ViewWishlist(){
		return view('frontend.wishlist.view_wishlist');
	}

    public function RemoveWishlistProduct($id){
        $user_id = session("USER_ID");
        Wishlist::where('user_id',$user_id)->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
	}


}
