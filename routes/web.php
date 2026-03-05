<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as ProductFront;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin',        [AuthController::class, 'login_admin']);
Route::post('admin',        [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);


Route::group(['middleware' => 'user'], function () {

  Route::get('user/dashboard', [UserController::class, 'dashboard']);
  Route::get('user/orders', [UserController::class, 'orders']);
  Route::get('user/orders/detail/{id}', [UserController::class, 'orders_detail']);

  Route::get('user/edit-profile', [UserController::class, 'edit_profile']);
  Route::post('user/edit-profile', [UserController::class, 'update_profile']);

  Route::get('user/change-password', [UserController::class, 'change_password']);
  Route::post('user/change-password', [UserController::class, 'update_password']);

  Route::post('add_to_wishlist', [UserController::class, 'add_to_wishlist']);
  Route::get('my-wishlist', [ProductFront::class, 'my_wishlist']);
  Route::post('user/make-review', [UserController::class, 'submit_review']);
  Route::get('user/notifications', [UserController::class, 'notifications']); 
  
  Route::post('blog/submit_comment', [HomeController::class, 'submit_blog_comment']);

});


Route::group(['middleware' => 'admin'], function () {

  Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

  Route::get('admin/admin/list', [AdminController::class,'list'])->name('list');
  Route::get('admin/admin/add',[AdminController::class,'add'])->name('add');
  Route::post('admin/admin/add',[AdminController::class,'insert']);
  Route::get('admin/admin/edit/{id}',[AdminController::class,'edit'])->name('edit');
  Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);
  Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);
   Route::get('admin/notifications', [AdminController::class, 'notifications']);

  //Customers

  Route::get('admin/customer/list', [AdminController::class, 'customer_list'])->name('admin.customer_list');

  //Orders
  Route::get('admin/orders/list', [OrderController::class, 'list'])->name('orders.list');
  Route::get('admin/orders/detail/{id}', [OrderController::class, 'order_detail'])->name('orders.detail');
  Route::get('admin/order_status', [OrderController::class, 'order_status']);

  //PDF

  Route::get('admin/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generatePDF');;

  // Categories
  Route::get('admin/category/list',        [CategoryController::class, 'list'])->name('category.list');
  Route::get('admin/category/add',         [CategoryController::class, 'add'])->name('category.add');
  Route::post('admin/category/add',         [CategoryController::class, 'insert']);
  Route::get('admin/category/edit/{id}',   [CategoryController::class, 'edit'])->name('category.edit');
  Route::post('admin/category/edit/{id}',   [CategoryController::class, 'update']);
  Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

  //Blog Categories

  Route::get('admin/blog_category/list',        [BlogCategoryController::class, 'list'])->name('blog_category.list');
  Route::get('admin/blog_category/add',         [BlogCategoryController::class, 'add'])->name('blog_category.add');
  Route::post('admin/blog_category/add',        [BlogCategoryController::class, 'insert']);
  Route::get('admin/blog_category/edit/{id}',   [BlogCategoryController::class, 'edit'])->name('blog_category.edit');
  Route::post('admin/blog_category/edit/{id}',  [BlogCategoryController::class, 'update']);
  Route::get('admin/blog_category/delete/{id}', [BlogCategoryController::class, 'delete']);

  //Blog Categories

  Route::get('admin/blog/list',        [BlogController::class, 'list'])->name('blog.list');
  Route::get('admin/blog/add',         [BlogController::class, 'add'])->name('blog.add');
  Route::post('admin/blog/add',        [BlogController::class, 'insert']);
  Route::get('admin/blog/edit/{id}',   [BlogController::class, 'edit'])->name('blog.edit');
  Route::post('admin/blog/edit/{id}',  [BlogController::class, 'update']);
  Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete']);

  // Sub Categories
  Route::get('admin/sub_category/list',        [SubCategoryController::class, 'list'])->name('sub_category.list');
  Route::get('admin/sub_category/add',         [SubCategoryController::class, 'add'])->name('sub_category.add');
  Route::post('admin/sub_category/add',         [SubCategoryController::class, 'insert']);
  Route::get('admin/sub_category/edit/{id}',   [SubCategoryController::class, 'edit'])->name('sub_category.edit');
  Route::post('admin/sub_category/edit/{id}',   [SubCategoryController::class, 'update']);
  Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);

  Route::post('admin/get_sub_category',         [SubCategoryController::class, 'get_sub_category']);



  // Brand
  Route::get('admin/brand/list',        [BrandController::class, 'list'])->name('brand.list');
  Route::get('admin/brand/add',         [BrandController::class, 'add'])->name('brand.add');
  Route::post('admin/brand/add',         [BrandController::class, 'insert']);
  Route::get('admin/brand/edit/{id}',   [BrandController::class, 'edit'])->name('brand.edit');
  Route::post('admin/brand/edit/{id}',   [BrandController::class, 'update']);
  Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);

  // Color
  Route::get('admin/color/list',        [ColorController::class, 'list'])->name('color.list');
  Route::get('admin/color/add',         [ColorController::class, 'add'])->name('color.add');
  Route::post('admin/color/add',         [ColorController::class, 'insert']);
  Route::get('admin/color/edit/{id}',   [ColorController::class, 'edit'])->name('color.edit');
  Route::post('admin/color/edit/{id}',   [ColorController::class, 'update']);
  Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);

  // EXPORT EXCEL
  Route::controller(ProductController::class)->group(function(){
    Route::get('admin/product/index', 'index')->name('product.index');
    Route::get('admin/product/products_export', 'export')->name('products.export');
    Route::post('admin/product/products_import', 'import')->name('products.import');
});
 


  //Product
  Route::get('admin/product/list',        [ProductController::class, 'list'])->name('product.list');
  Route::get('admin/product/add',         [ProductController::class, 'add']) ->name('product.add');
  Route::post('admin/product/add',         [ProductController::class, 'insert']);
  Route::get('admin/product/edit/{id}',   [ProductController::class, 'edit'])->name('product.edit');
  Route::post('admin/product/edit/{id}',  [ProductController::class, 'update']);
  Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);

  Route::get('admin/product/image_delete/{id}',  [ProductController::class, 'image_delete']);
  Route::post('admin/product_image_sortable',  [ProductController::class, 'product_image_sortable']);

  // Discount
  Route::get('admin/discount_code/list',        [DiscountCodeController::class, 'list'])->name('discount_code.list');
  Route::get('admin/discount_code/add',         [DiscountCodeController::class, 'add'])->name('discount_code.add');
  Route::post('admin/discount_code/add',         [DiscountCodeController::class, 'insert']);
  Route::get('admin/discount_code/edit/{id}',   [DiscountCodeController::class, 'edit'])->name('discount_code.edit');
  Route::post('admin/discount_code/edit/{id}',   [DiscountCodeController::class, 'update']);
  Route::get('admin/discount_code/delete/{id}', [DiscountCodeController::class, 'delete']);

  // Shipping Charge
  Route::get('admin/shipping_charge/list',        [ShippingChargeController::class, 'list'])->name('shipping_charge.list');
  Route::get('admin/shipping_charge/add',         [ShippingChargeController::class, 'add'])->name('shipping_charge.add');
  Route::post('admin/shipping_charge/add',         [ShippingChargeController::class, 'insert']);
  Route::get('admin/shipping_charge/edit/{id}',   [ShippingChargeController::class, 'edit'])->name('shipping_charge.edit');
  Route::post('admin/shipping_charge/edit/{id}',   [ShippingChargeController::class, 'update']);
  Route::get('admin/shipping_charge/delete/{id}', [ShippingChargeController::class, 'delete']);

  //Review
  Route::get('admin/review/list',        [AdminController::class, 'review_list'])->name('review.list');
  Route::get('admin/review_delete/{id}', [AdminController::class, 'review_delete']);

  //Page
  Route::get('admin/page/list',        [PageController::class, 'list'])->name('page.list');
  Route::get('admin/page/edit/{id}',   [PageController::class, 'edit'])->name('page.edit');
  Route::post('admin/page/edit/{id}',   [PageController::class, 'update']);

  //Setting
  Route::get('admin/system-setting',        [PageController::class, 'system_setting'])->name('admin.system_setting');
  Route::post('admin/system-setting',        [PageController::class, 'update_system_setting']);
  
  //Home PAge Setting
  Route::get('admin/home-setting',        [PageController::class, 'home_setting'])->name('admin.home_setting');
  Route::post('admin/home-setting',        [PageController::class, 'update_home_setting']);

  // Smtp Setting
  Route::get('admin/smtp-setting',        [PageController::class, 'smtp_setting'])->name('admin.smtp_setting');
  Route::post('admin/smtp-setting',        [PageController::class, 'update_smtp_setting']);

    // Card Setting
  Route::get('admin/card-setting',        [PageController::class, 'card_setting'])->name('admin.card_setting');
  Route::post('admin/card-setting',       [PageController::class, 'update_card_setting']);

  //Envelope
  Route::get('admin/contactus', [PageController::class, 'contactus'])->name('admin.contactus');
  Route::get('admin/contactus/delete/{id}',  [PageController::class, 'contactus_delete']);
  Route::get('admin/notification', [PageController::class, 'notification'])->name('admin.notification');

  //Slider
  Route::get('admin/slider/list',        [SliderController::class, 'list'])->name('slider.list');
  Route::get('admin/slider/add',         [SliderController::class, 'add'])->name('slider.add');
  Route::post('admin/slider/add',         [SliderController::class, 'insert']);
  Route::get('admin/slider/edit/{id}',   [SliderController::class, 'edit'])->name('slider.edit');
  Route::post('admin/slider/edit/{id}',   [SliderController::class, 'update']);
  Route::get('admin/slider/delete/{id}', [SliderController::class, 'delete']);

  //Partner
  Route::get('admin/partner/list',        [PartnerController::class, 'list'])->name('partner.list');
  Route::get('admin/partner/add',         [PartnerController::class, 'add'])->name('partner.add');
  Route::post('admin/partner/add',         [PartnerController::class, 'insert']);
  Route::get('admin/partner/edit/{id}',   [PartnerController::class, 'edit'])->name('partner.edit');
  Route::post('admin/partner/edit/{id}',   [PartnerController::class, 'update']);
  Route::get('admin/partner/delete/{id}', [PartnerController::class, 'delete']);
});




// Main Page
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('recent_arrival_category_product', [HomeController::class, 'recent_arrival_category_product']);

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'submit_contact']);

Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog/category/{slug}', [HomeController::class, 'blog_category'])->name('blog_category');
Route::get('blog/{slug}', [HomeController::class, 'blog_detail'])->name('blog_detail');

Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('privacy-policy', [HomeController::class,      'privacy_policy'])->name('privacy_policy');
Route::get('payment-method', [HomeController::class,      'payment_method'])->name('payment_method');
Route::get('shipping-method', [HomeController::class,     'shipping_method'])->name('shipping_method');
Route::get('return-policy', [HomeController::class,       'return_policy'])->name('return_policy');
Route::get('money-back', [HomeController::class,          'money_back'])->name('money_back');
Route::get('terms-and-condition', [HomeController::class, 'terms_and_condition'])->name('terms_and_condition');

//Auth Register User
Route::post('auth_register', [AuthController::class, 'auth_register']);
//Auth Login User
Route::post('auth_login', [AuthController::class, 'auth_login']);

//Reset Password Link
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::post('forgot-password', [AuthController::class, 'auth_forgot_password']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'auth_reset']);



//Auth Activate User
Route::get('activate/{id}', [AuthController::class, 'activate_email']);


//Cart
Route::get('cart', [PaymentController::class, 'cart'])->name('cart');
Route::post('update_cart', [PaymentController::class, 'update_cart']);
Route::get('cart/delete/{id}', [PaymentController::class, 'cart_delete']);

//Checkout
Route::get('checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('checkout/apply_discount_code', [PaymentController::class, 'apply_discount_code']);
Route::post('checkout/apply_discount_code', [PaymentController::class, 'apply_discount_code']);
Route::post('checkout/place_order', [PaymentController::class, 'place_order']);
Route::get('checkout/payment', [PaymentController::class, 'checkout_payment']);



Route::post('product/add-to-cart', [PaymentController::class, 'add_to_cart']);


Route::get('search', [ProductFront::class, 'getProductSearch'])->name('search');
Route::post('get_filter_product_ajax', [ProductFront::class, 'getFilterProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductFront::class, 'getCategory'])->name('category');

