<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;
use App\Models\ProductWishlistModel;
use App\Models\ProductReviewModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function dashboard()
   {
      $data['meta_title'] = 'Панель покупця';
      $data['meta_keywords'] = '';
      $data['meta_description'] = '';
      $data['TotalOrder'] = OrderModel::getTotalOrderUser(FacadesAuth::user()->id);
      $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrderUser(Auth::user()->id);
      $data['TotalAmount'] = OrderModel::getTotalAmountUser(Auth::user()->id);
      $data['TotalTodayAmount'] = OrderModel::getTotalTodayAmountUser(Auth::user()->id);

      $data['TotalPending'] = OrderModel::getStatusTotalUser(Auth::user()->id, 0);
      $data['TotalInprogress'] = OrderModel::getStatusTotalUser(Auth::user()->id, 1);
      $data['TotalCompleted'] = OrderModel::getStatusTotalUser(Auth::user()->id, 3);
      $data['TotalCancelled'] = OrderModel::getStatusTotalUser(Auth::user()->id, 4);
      return view('user.dashboard', $data);
   }


   public function orders(Request $request)
   {

      if(!empty($request->noti_id)){
         NotificationModel::updateReadNoti($request->noti_id);
     }

      $data['getRecord'] = OrderModel::getRecordUser(Auth::user()->id);
      $data['meta_title'] = 'Замовлення';
      $data['meta_keywords'] = '';
      $data['meta_description'] = '';

      return view('user.orders', $data);
   }

   public function orders_detail($id)
   {

      $data['getRecord'] = OrderModel::getSingleOrderUser(Auth::user()->id, $id);
      if (!empty($data['getRecord'])) {
         $data['meta_title'] = 'Деталі Замовлення';
         $data['meta_keywords'] = '';
         $data['meta_description'] = '';
         return view('user.orders_detail', $data);
      } else {
         abort(404);
      }
   }

   public function edit_profile()
   {
      $data['meta_title'] = 'Редагувати профіль';
      $data['meta_keywords'] = '';
      $data['meta_description'] = '';
      $data['getRecord'] = User::getSingle(Auth::user()->id);

      return view('user.edit_profile', $data);
   }

   public function update_profile(Request $request)
   {

      $user = User::getSingle(Auth::user()->id);
      $user->name = trim($request->first_name);
      $user->last_name = trim($request->last_name);
      $user->company_name = trim($request->company_name);
      $user->phone = trim($request->phone);
      $user->email = trim($request->email);
      $user->delivery_address = trim($request->delivery_address);
      $user->save();

      return redirect()->back()->with('success', "Профіль оновлено успішно!");
   }

   public function notifications(Request $request)
   {
     
      $data['meta_title'] = 'Сповіщення';
      $data['meta_keywords'] = '';
      $data['meta_description'] = '';
   $data['getRecord'] = NotificationModel::getByUser(Auth::user()->id);

      return view('user.notification', $data);
   }

   public function change_password()
   {
      $data['meta_title'] = 'Змінити пароль';
      $data['meta_keywords'] = '';
      $data['meta_description'] = '';

      return view('user.change_password', $data);
   }

   public function update_password(Request $request)
   {
      //dd($request->all());
      $user = User::getSingle(Auth::user()->id);
      if (Hash::check($request->old_password, $user->password)) {
         if ($request->password == $request->cpassword) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', "Пароль оновлено успішно!");
         } else {
            return redirect()->back()->with('error', "Новий пароль та пароль підтвердження не співпадають!");
         }
      } else {
         return redirect()->back()->with('error', "Введіть старий пароль правильно!");
      }
   }
   public function add_to_wishlist(Request $request)
   {

      $check = ProductWishlistModel::checkAlready($request->product_id, Auth::user()->id);

      if (empty($check))
       {
         $save = new ProductWishlistModel;
         $save->product_id = $request->product_id;
         $save->user_id = Auth::user()->id;
         $save->save();

         $json['is_wishlist'] = 1;
      } 
      else 
      {
         ProductWishlistModel::DeleteRecord($request->product_id, Auth::user()->id);
         $json['is_wishlist'] = 0;
      }

      $json['status'] = 'true';
      echo json_encode($json);
   }

   public function submit_review(Request $request)
    {
      $save = new ProductReviewModel;
      $save->product_id = trim($request->product_id);
      $save->order_id = trim($request->order_id);
      $save->user_id = Auth::user()->id;
      $save->is_delete = 0;
      $save->rating = trim($request->rating);
      $save->review = trim($request->review);
      $save->created_at = date('Y-m-d H:i:s');
      $save->save();

      return redirect()->back()->with('success', "Ваш відгук успішно відправлено!");
   
      
    }
}
