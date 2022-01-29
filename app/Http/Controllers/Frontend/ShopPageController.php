<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
   
    public function ShopPage(Request $request){
        
        $sort = "";

        if ($request->get('sort')!=null) {
            $sort = $request->get('sort');
        }

        $products = Product::where('status',1);
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


       /* if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds)->paginate(9);
        }
         if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds)->paginate(9);
        }
        else{
             $products = Product::where('status',1)->paginate(9);
        }*/

 
        $brands = Brand::orderBy('brand_name','ASC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('frontend.shop.shop_page',compact('products','categories','brands'));
    }
}
