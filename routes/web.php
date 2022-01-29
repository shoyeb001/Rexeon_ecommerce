<?php

use App\Http\Controllers\AdminController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminRefer;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopPageController;
use App\Http\Controllers\Pickupcenter;
use App\Http\Controllers\User\AllUserController;
use  App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\Referearn;
use App\Http\Middleware\UserAuth;
use App\Models\Referer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/mail", [UserAuthController::class, "sendmail"]);

//admin routes

Route::get("/admin/login", function () {
    return view('auth/admin_login');
});

Route::post("admin/auth", [AdminController::class, 'AdminLogin'])->name("admin.login");

Route::group(['middleware' => ['adminauth']], function () {       //admin routes

    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');


    Route::get("/admin/dashboard", [AdminProfileController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile.view');

    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('/admin/profile/update',[AdminProfileController::class,'AdminProfileUpdate'])->name("admin.profile.update");

    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post("admin/password/update",[AdminProfileController::class,'UpdatePassword'])->name("admin.password.update");



    //backend category routes

    Route::get('/category/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->name('store.category');

    Route::get('/category/edit/{slug}', [CategoryController::class, 'CategoryEdit'])->name('edit.category');

    Route::post('/category/update/{slug}', [CategoryController::class, 'CategoryUpdate'])->name("update.category");

    Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name("delete.category");

    //backend sub category routes

    Route::get('/category/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name("all.subcategory");

    Route::post('category/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name("add.subcategory");

    Route::get("/category/sub/edit/{id}", [SubCategoryController::class, 'SubCategoryEdit'])->name("edit.subcategory");

    Route::post("/category/sub/update", [SubCategoryController::class, 'SubCategoryUpdate'])->name("update.subcategory");

    Route::get("/category/sub/delete/{id}", [SubCategoryController::class, 'SubCategoryDelete'])->name("delete.subcategory");

    //backend sub sub category routes

    Route::get("/category/sub/sub/view", [SubCategoryController::class, 'SubSubCategoryView'])->name("all.subsubcategory");

    Route::get('/category/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::get('/category/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

    Route::post("/category/sub/sub/store", [SubCategoryController::class, 'SubSubCategoryStore'])->name("store.subsubcategory");

    Route::get("/category/sub/sub/edit/{id}", [SubCategoryController::class, 'SubSubCategoryEdit'])->name("edit.subsubcategory");

    Route::post("/category/sub/sub/update", [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('update.subsubcategory');

    Route::get("/category/sub/sub/delete/{id}", [SubCategoryController::class, 'SubSubCategoryDelete'])->name("delete.subsubcategory");

    //Backend Slidder Routes

    Route::get("/slider/view", [SliderController::class, "SliderView"])->name("manage-slider");

    Route::post("/slider/store", [SliderController::class, "SliderStore"])->name("slider.store");

    Route::get("/slider/edit/{id}", [SliderController::class, "SliderEdit"])->name("slider.edit");

    Route::post("/slider/update", [SliderController::class, "SliderUpdate"])->name("slider.update");

    Route::get("/slider/delete/{id}", [SliderController::class, "SliderDelete"])->name("slider.delete");

    Route::get('/slider/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');

    Route::get('/slider/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

    //Backend Brands

    Route::get('/brand/view', [BrandController::class, 'BrandView'])->name("all.brand");

    Route::post('/brand/store', [BrandController::class, 'BrandStore'])->name("brand.store");

    Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit'])->name("brand.edit");

    Route::post('/brand/update', [BrandController::class, 'BrandUpdate'])->name("brand.update");

    Route::get('/brand/delete/{id}', [BrandController::class, 'BrandDelete'])->name("brand.delete");


    //backend products

    Route::get('/product/manage', [ProductController::class, 'ManageProduct'])->name("manage-product");

    Route::get('/product/add', [ProductController::class, 'AddProduct'])->name("add.product");

    Route::post('/product/store', [ProductController::class, 'StoreProduct'])->name("store.product");

    Route::get('/product/edit/{id}', [ProductController::class, 'EditProduct'])->name("edit.product");

    Route::post('/product/update', [ProductController::class, 'UpdateProduct'])->name("update.product");

    Route::get('/product/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

    Route::post('/product/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update.thumbnail.image');

    Route::post('/product/image/update', [ProductController::class, 'UpdateProductImage'])->name("update.product.image");

    Route::get('/product/delete/{id}', [ProductController::class, 'DeleteProduct'])->name("delete.product");

    Route::get('/product/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

    Route::get('/product/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

    //stock product

    Route::get("/stock/product", [ProductController::class, 'StockProduct'])->name("stock.product");

    //admin site setting

    Route::get("/setting/site", [SiteSettingController::class, 'SiteSetting'])->name("setting.site");

    Route::post("/setting/site/update", [SiteSettingController::class, 'UpdateSiteSetting'])->name("update.sitesetting");

    Route::get("/setting/seo", [SiteSettingController::class, 'SeoSetting'])->name("setting.seo");

    Route::post("/setting/seo/update", [SiteSettingController::class, 'UpdateSeoSetting'])->name("update.seo");

    //admin orders route

    Route::get("/orders/pending/orders",[OrderController::class,'PendingOrder'])->name("pending.order");

    Route::get('orders/pending/orders/details/{id}',[OrderController::class,'PendingOrderDetails'])->name('pending.order.details');

    Route::get('orders/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending.confirm');

    Route::get('/orders/processing/confirm/{order_id}',[OrderController::class,'ConfirmToProcessing'])->name("confirm.processing");

    Route::get('/orders/processing/picked/{order_id}',[OrderController::class,'ProcessingToPicked'])->name("processing.picked");

    Route::get('/orders/processing/shipped/{order_id}',[OrderController::class,'PickedToShipped'])->name('picked.shipped');

    Route::get('/orders/shipped/delivered/{order_id}',[OrderController::class,'ShippedToDelivered'])->name("shipped.delivered");

    Route::get('/orders/confirmed/orders',[OrderController::class,'ConfirmedOrder'])->name("confirmed.order");

    Route::get('orders/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing.orders');

    Route::get('orders/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');

    Route::get('orders/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked.orders');

    Route::get('orders/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped.orders');

    Route::get('orders/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered.orders');

    Route::get('orders/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel.orders');

    //admin user roles routes

    Route::get('adminuserrole/all',[AdminUserController::class,'AllAdminRole'])->name("all.admin.user");

    Route::get("adminuserrole/add",[AdminUserController::class,'AddAdminRole'])->name("add.admin.user");

    Route::post("adminuserrole/store",[AdminUserController::class,'StoreAdminRole'])->name("store.admin.user");

    Route::get("adminuserrole/edit/{id}",[AdminUserController::class,'EditAdminRole'])->name("edit.admin.user");

    Route::post("adminuserrole/update",[AdminUserController::class,'UpdateAdminRole'])->name("update.admin.user");

    Route::get("adminuserrole/delete/{id}",[AdminUserController::class,'DeleteAdminRole'])->name("delete.role");


    //admin return 

    Route::get("return/admin/request",[ReturnController::class,'ReturnRequest'])->name("return.request");

    Route::get("return/admin/approve/{order_id}",[ReturnController::class,'ReturnApprove'])->name("return.approve");

    Route::get("return/admin/all/request",[ReturnController::class,'ReturnAll'])->name("return.all");

   //admin get all users

   Route::get("alluser/view",[AdminProfileController::class,'GetAllUsers'])->name("get.all.users");

   //refers

   Route::get("refers/view",[AdminRefer::class,'ViewRefers'])->name("view.refers");

   Route::get("refers/due/payments",[AdminRefer::class,'ViewDuePayment'])->name("view.due.payment");

   Route::get("refers/due/payment/details/{user_id}",[AdminRefer::class,'ViewPaymentDetails'])->name("refers.view.details");

   Route::get("refers/payment/complete/{refer_id}",[AdminRefer::class,'CompletePayment'])->name("refer.payment.complete");

   //pickup centers
   
   Route::get("pickup-center/view",[Pickupcenter::class,'ViewPickUpCenter'])->name("pickupcenter.view");
 
   Route::post("pickup-center/add",[Pickupcenter::class,'AddPickUpCenter'])->name("pickupcenter.add");

   Route::get("pickup-center/edit/{id}",[Pickupcenter::class,'EditPickUpCenter'])->name("pickupcenter.edit");

   Route::post("pickup-center/update",[Pickupcenter::class,'UpdatePickUpCenter'])->name("pickupcenter.update");

   Route::get("pickup-center/delete/{id}",[Pickupcenter::class,'DeletePickUpCenter'])->name("pickupcenter.delete");
    
}); //guard ends





//frontend routes

Route::get("/", [IndexController::class, "index"])->name('frontend.index');

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get("user/logout",[UserAuthController::class,"UserLogOut"])->name("user.logout");

Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
})->name('auth.forgot_password');

Route::get('/user/verify/{email}', [UserAuthController::class, "EmailVerify"]);

Route::post("/register", [UserAuthController::class, "UserRegister"])->name("user.register");

Route::post("/user/login/auth", [UserAuthController::class, "UserLoginAuth"])->name("user.login.auth");

Route::get("/user/logout", [UserAuthController::class, "UserLogout"])->name("user.logout");

Route::get("/user/forgot-password",[UserAuthController::class,"UserForgotPassword"])->name("user.forgot.password");

Route::post("/user/email/password/reset",[UserAuthController::class,"MailResetPassword"])->name("password.email");


//product routes

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

//subcategory based data

Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

//tag wise product
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

//product view modal 

Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']); //add to cart

Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']); //mini cart view

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']); //remove mini cart

//mycart 

Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

//add to wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::group(['middleware' => ['userauth']], function () {

    //checkout routes

    Route::get('user/checkout', [CartController::class, 'CreateCheckOut'])->name("checkout");

    Route::post('user/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name("checkout.store");

    //payment orders

    Route::post('/user/stripe/order', [StripeController::class, 'StripeOrder'])->name("stripe.order");

    Route::post('user/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    //wishlist controller

    Route::get('user/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    Route::get('user/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    Route::get('user/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    //user profile routes

    Route::get('user/profile',[IndexController::class,'GetUserProfile'])->name("user.profile");

    Route::post('user/profile/store',[IndexController::class,'UserProfileStore'])->name("user.profile.store");

    Route::get("/user/dashboard",function(){ return view("dashboard");})->name("dashboard");

    Route::get("/user/change-password",[IndexController::class,"ChangePassword"])->name("change.password");

    Route::post("/user/password/update",[IndexController::class,"UpdatePassword"])->name("user.password.update");

   Route::get("/user/myorder",[AllUserController::class,"MyOrder"])->name("user.myorder");

   Route::get("/user/order_details/{id}",[AllUserController::class,"OrderDetails"])->name("user.order.details");

   Route::get("/user/invoice_download/{id}",[AllUserController::class,"InvoiceDownload"]);

   Route::post("/user/return/order/{order_id}",[AllUserController::class,"ReturnOrder"])->name("user.return.order");

   Route::get('/user/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');


   Route::get('/user/cancel/orders',[AllUserController::class,'CancelOrders'])->name("user.cancel.orders");

   //refer and earn

   Route::get("/refer-earn/register",[Referearn::class,'Register'])->name("refer.earn.register");

   Route::post("/refer-earn/signup",[Referearn::class,'Signup'])->name("refer.signup");

   Route::get("/user/refer/insights",[Referearn::class,'UserInsights'])->name("user.refer.insight");

   Route::get("/user/refer/payment-details",[Referearn::class,'UserPaymentDetails'])->name("user.refer.payment");

   Route::post("user/refer/payment/update",[Referearn::class,'UserPaymentUpdate'])->name("refer.payment.update");

   Route::get("/user/refer/withdraws",[Referearn::class,'UserReferWithdraws'])->name("user.refer.withdraw");

   Route::get("/refer/share",[Referearn::class,'ReferShare'])->name("refer.share");

});

   //user order tracking

Route::get("/product/details/{id}/refer/{refer_id}",[Referearn::class,'ReferSave']);

   
Route::post('/order/tracking', [AllUserController::class, 'OrderTracking'])->name('order.tracking');    


//shop page

Route::get("/shop",[ShopPageController::class,"ShopPage"])->name("shoppage");

//search page

Route::post("/search",[IndexController::class,"SearchProduct"])->name("product.search");

//advance search

Route::post("/search-product",[IndexController::class,"ProductSearch"])->name("search.product");

Route::get("/login/refer/{id}",[UserAuthController::class,"ReferSignup"])->name("refer.register");



