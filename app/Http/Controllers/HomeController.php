<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SystemSettingModel;
use App\Models\ContactUsModel;
use App\Models\SliderModel;
use App\Models\PartnerModel;
use App\Models\CategoryModel;
use App\Models\BlogCategoryModel;
use App\Models\ProductModel;
use App\Models\BlogCommentModel;
use App\Models\BlogModel;
use App\Models\HomeSettingModel;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use Session;

class HomeController extends Controller
{
   public function home()
   {
      $getPage = PageModel::getSlug('home');
      $data['getPage'] = $getPage;

      $data['getHomeSetting'] = HomeSettingModel::getSingle();

      $data['getBlog'] = BlogModel::getRecordActiveHome();
      $data['getSlider'] = SliderModel::getRecordActive();
      $data['getPartner'] = PartnerModel::getRecordActive();
      $data['getCategory'] = CategoryModel::getRecordActiveHome();
      $data['getProduct'] = ProductModel::getRecentArrival();
      $data['getProductTrendy'] = ProductModel::getProductTrendy();

      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('home', $data);
   }

   public function recent_arrival_category_product(Request $request)
   {
      $getProduct = ProductModel::getRecentArrival();
      $getCategory = CategoryModel::getSingle($request->category_id);

      return response()->json([
         "status" => true,
         "success" => view("product._list_recent_arrival", [
            "getProduct" => $getProduct,
            "getCategory" => $getCategory,
         ])->render(),
      ], 200);
   }

   public function contact()
   {
      $first_number =  mt_rand(0, 9);
      $second_number =  mt_rand(0, 9);

      $data['first_number'] = $first_number;
      $data['second_number'] = $second_number;

      Session::put('total_sum', $first_number + $second_number);

      $data['getPage'] = PageModel::getSlug('contacts');
      $data['getSystemSettingApp'] = SystemSettingModel::getSingle();

      return view('page.contact', $data);
   }

   public function submit_contact(Request $request)
   {
      if (!empty($request->verification) && !empty(Session::get('total_sum'))) {
         if (trim(Session::get('total_sum')) == trim($request->verification)) {
            $save = new ContactUsModel;

            if (!empty(Auth::check())) {
               $save->user_id = Auth::user()->id;
            }
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->phone = trim($request->phone);
            $save->subject = trim($request->subject);
            $save->message = trim($request->message);
            $save->save();
            $getSystemSetting = SystemSettingModel::getSingle();
            try {
               Mail::to($getSystemSetting->submit_email)->send(new ContactUsMail($save));
            } catch (\Exception $e) {
            }
            return redirect()->back()->with('success', 'Повідомлення надіслано успішно!');
         } else {
            return redirect()->back()->with('error', 'Сума перевірки неправильна!');
         }
      } else {
         return redirect()->back()->with('error', 'Сума перевірки неправильна!');
      }
   }




   public function about()
   {
      $getPage = PageModel::getSlug('pro-nas');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.about', $data);
   }

   public function faq()
   {

      $getPage = PageModel::getSlug('faq');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.faq', $data);
   }

   public function privacy_policy()
   {

      $getPage = PageModel::getSlug('privacy-policy');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.privacy_policy', $data);
   }

   public function payment_method()
   {

      $getPage = PageModel::getSlug('payment-method');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;

      return view('page.payment_method', $data);
   }

   public function shipping_method()
   {
      $getPage = PageModel::getSlug('shipping-method');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;

      return view('page.shipping_method', $data);
   }

   public function return_policy()
   {

      $getPage = PageModel::getSlug('return-policy');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.return_policy', $data);
   }

   public function money_back()
   {
      $getPage = PageModel::getSlug('money-back');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.money_back', $data);
   }

   public function terms_and_condition()
   {

      $getPage = PageModel::getSlug('terms-and-condition');
      $data['getPage'] = $getPage;
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      return view('page.terms_and_condition', $data);
   }


   public function blog()
   {
      $getPage = PageModel::getSlug('blog');
      if (!$getPage) {
         abort(404, 'Сторінку не знайдено');
      }

      $data['getPage'] = $getPage;
      $data['header_title'] = 'Блог';
      $data['meta_title'] =  $getPage->meta_title;
      $data['meta_keywords'] = $getPage->meta_keywords;
      $data['meta_description'] = $getPage->meta_description;
      $data['getBlog'] = BlogModel::getBlog();
      $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();
      $data['getPopular'] = BlogModel::getPopular();
      return view('blog.list', $data);
   }

   public function blog_detail($slug)
   {

      $getBlog = BlogModel::getSingleSlug($slug);
      if (!empty($getBlog)) {

         $total_view =  $getBlog->total_view;
         $getBlog->total_view = $total_view + 1;
         $getBlog->save();
         $data['getBlog'] =  $getBlog;
         $data['header_title'] = 'Блог деталі';
         $data['meta_title'] =  $getBlog->meta_title;
         $data['meta_keywords'] = $getBlog->meta_keywords;
         $data['meta_description'] = $getBlog->meta_description;
         $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();
         $data['getPopular'] = BlogModel::getPopular();
         $data['getRelatedPost'] = BlogModel::getRelatedPost($getBlog->blog_category_id, $getBlog->id);
         $data['breadcrumbs'] = Breadcrumbs::generate('blog_detail', $getBlog);
         return view('blog.detail', $data);
      } else {
         abort(404, 'Сторінку не знайдено');
      }
   }


   public function blog_category($slug)
   {
      $getCategory = BlogCategoryModel::getSingleSlug($slug);
      $category = BlogCategoryModel::where('slug', $slug)->firstOrFail();
      if (!empty($getCategory)) {
         $data['category'] = $category;
         $data['getCategory'] =  $getCategory;
         $data['header_title'] = 'Блог деталі';
         $data['meta_title'] =  $getCategory->meta_title;
         $data['meta_keywords'] = $getCategory->meta_keywords;
         $data['meta_description'] = $getCategory->meta_description;

         $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();
         $data['getPopular'] = BlogModel::getPopular();
         $data['getBlog'] = BlogModel::getBlog($getCategory->id);

         return view('blog.category', $data);
      } else {
         abort(404, 'Сторінку не знайдено');
      }
   }

   public function submit_blog_comment(Request $request)
   {
      $comment = new BlogCommentModel;

      $comment->user_id = Auth::user()->id;
      $comment->blog_id = $request->blog_id;
      $comment->comment = trim($request->comment);
      $comment->save();
      return redirect()->back()->with('success', 'Коментар успішно додано!');
   }
}
