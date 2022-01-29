<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
    	$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
    	$categories = Category::orderBy('category_name','ASC')->get();

    	$featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
    	$hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    	$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

    	$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

    	$skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

    	$skip_category_1 = Category::skip(1)->first();
    	$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

    	$skip_brand_1 = Brand::skip(1)->first();
    	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();


    	// return $skip_category->id;
    	// die();

    	return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));

    }

    public function ProductDetails($id){
        $product = Product::findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
		
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color','product_size','relatedProduct'));
    }

    public function SubCatWiseProduct(Request $request, $subcat_id, $slug){
		 
        $sort = "";

        if ($request->get('sort')!=null) {
            $sort = $request->get('sort');
        }

        $products = Product::where('status',1)->where('subcategory_id',$subcat_id);
		if ($sort=="price_lowest") {
            $products = $products->orderBy("selling_price","ASC");
        }
        if ($sort=="price_higest") {
            $products = $products->orderBy("selling_price","DESC");
        }
        if ($sort=="product_name_asc") {
            $products = $products->orderBy("product_name","ASC");
        }

		$products = $products->paginate(9);
		$categories = Category::orderBy('category_name','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();


		///  Load More Product with Ajax 
		if ($request->ajax()) {
   $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

   $list_view = view('frontend.product.list_view_product',compact('products'))->render();
	return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	

		}
		///  End Load More Product with Ajax 

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));
    }

      // Sub-Subcategory wise data
	public function SubSubCatWiseProduct(Request $request,$subsubcat_id,$slug){
				 
        $sort = "";

        if ($request->get('sort')!=null) {
            $sort = $request->get('sort');
        }

		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id);
		if ($sort=="price_lowest") {
            $products = $products->orderBy("selling_price","ASC");
        }
        if ($sort=="price_higest") {
            $products = $products->orderBy("selling_price","DESC");
        }
        if ($sort=="product_name_asc") {
            $products = $products->orderBy("product_name","ASC");
        }
		$products = $products->paginate(9);
		$categories = Category::orderBy('category_name','ASC')->get();

		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));

	}

	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));
	}

	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}

	public function GetUserProfile(){
		$id = session("USER_ID");
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user'));
	}

	public function UserProfileStore(Request $request){
		$data = User::find(session("USER_ID"));
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
 

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);
	}

	public function ChangePassword(){
		$id = session("USER_ID");
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
	}

	public function UpdatePassword(Request $request){
		 $request->validate([
			'old_password' => 'required',
			'new_password' => 'required',
			'confirm_password'=>'required'
		]);
		$id = session("USER_ID");
		$user = User::find($id);

		$old_password = $request->input("old_password");
		$new_password = $request->input("new_password");
		$confirm_password = $request->input("confirm_password");

		if ($confirm_password != $new_password) {
			$notification = array(
				'message' => 'new password and confirm password are not same',
				'alert-type' => 'success'
			);
		}else {
			if ($old_password != $user->password) {
				$notification = array(
					'message'=>'please enter correct password',
					'alert-type'=>'error'
				);
			}else {
				$data = array(
					"password"=>$new_password
				);

				User::where("id",$id)->update($data);
				$notification = array(
					'message' => 'Password updated successfully',
					'alert-type' => 'success'
				);
			}
		}

		return redirect()->route('change.password')->with($notification);
	}

	public function SearchProduct(Request $request){
		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name','ASC')->get();
		$products = Product::where('product_name','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));
	}

	public function ProductSearch(Request $request){
		
		$request->validate(["search" => "required"]);

		$item = $request->search;		 
        
		$products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id','product_slug')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));

	}



}
