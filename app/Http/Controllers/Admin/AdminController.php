<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\NotificationModel;

class AdminController extends Controller
{
  public function list()
  {
    $data['getRecord'] = User::getAdmin();
    $data['header_title'] = 'Список Адмінів';
    return view('admin.admin.list', $data);
  }

  public function add()
  {

    $data['header_title'] = 'Додати нового Адміна';
    return view('admin.admin.add', $data);
  }

  public function insert(Request $request)
  {

    request()->validate([
      'email' => 'required|email|unique:users'

    ]);
    
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->status = $request->status;
    $user->is_admin = 1;
    $user->save();

    return redirect('admin/admin/list')->with('success', 'Адміна створено успішно!');
  }

  public function edit($id)
  {
    $data['getRecord'] = User::getSingle($id);
    $data['header_title'] = 'Редагувати Адміна';
    return view('admin.admin.edit', $data);
  }

  public function update($id, Request $request)
  {

    $currentUser = auth()->user(); // Поточний користувач
    $userToUpdate = User::getSingle($id); // Користувач, якого редагують

    // Перевірка: чи є користувач, якого редагують
    if (!$userToUpdate) {
        return redirect()->back()->with('error', 'Користувача не знайдено!');
    }

    // Перевірка: якщо поточний користувач не є супер-адміністратором і намагається редагувати не свій обліковий запис
    if (!$currentUser->isSuperAdmin() && $currentUser->id !== $userToUpdate->id) {
        return redirect()->back()->with('error', 'Ви можете редагувати тільки свій обліковий запис!');
    }


    
    request()->validate([
      'email' => 'required|email|unique:users,email,'.$id

    ]);

    $user = User::getSingle($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if (!empty($request->password))
     {
      $user->password = Hash::make($request->password);
    }
    
    $user->status = $request->status;
    $user->is_admin = 1;
    $user->save();

    return redirect('admin/admin/list')->with('success', 'Адміна оновлено успішно!');
  }

  public function delete($id)
  {
    $user = User::getSingle($id);
    if (!$user) {
      return redirect()->back()->with('error', 'Користувача не знайдено!');
  }
    
  if ($user->isSuperAdmin()) {
    return redirect('admin/admin/list')->with('error', 'Ви не можете видалити супер-адміністратора!');
}

// Перевірка: чи є поточний користувач супер-адміністратором
if (!auth()->user()->isSuperAdmin() && auth()->user()->id != $user->id) {
  return redirect('admin/admin/list')->with('error', 'Тільки супер-адміністратор може видаляти адміністраторів!');
}

// Перевірка: чи користувач намагається видалити свій обліковий запис
if (auth()->id() === $user->id) {
  return redirect('admin/admin/list')->with('error', 'Ви не можете видалити свій обліковий запис!');
}

    $user->is_delete = 1;
    $user->save();

    
    
    return redirect()->back()->with('success', 'Обліковий запис видалено успішно!');
  }

  public function customer_list(Request $request)
  {
    if(!empty($request->noti_id)){
      NotificationModel::updateReadNoti($request->noti_id);
  }
    $data['getRecord'] = User::getCustomer();
    $data['header_title'] = 'Клієнти';
    return view('admin.customer.list', $data);
  }

  public function review_list()
  {
    $data['getRecord'] = ProductReviewModel::getReviews();
    $data['header_title'] = 'Відгуки';

    $reviews = ProductReviewModel::with('user')->get();

    return view('admin.review.list', $data, compact('reviews'));
  }


  

  // Delete Review
  public function review_delete($id)
{
    $review = ProductReviewModel::find($id);
    if ($review) {
        $review->delete();
        return redirect()->back()->with('success', 'Відгук видалено успішно!');
    } else {
        return redirect()->back()->with('error', 'Відгук не знайдено!');
    }
}



  
}
  
