<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;


class AuthController extends Controller
{

  ///////////////////////////////////////////////////////

  /* Login Admin */
  public function login_admin()
  {

    if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
      return redirect('admin/dashboard');
    }
    //dd(Hash::make('Eaglerider2024'));
    return view('admin.auth.login');
  }

  ///////////////////////////////////////////////////////

  /* Auth Login Admin */

  public function auth_login_admin(Request $request)
  {

    $remember = !empty($request->remember) ? true : false;
    if (
      Auth::attempt(
        ['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0],
        $remember
      )
    ) {
      return redirect('admin/dashboard');
    } else {
      return redirect()->back()->with('error', "Будь-ласка, введіть поточний емейл і пароль");
    }
  }

  ///////////////////////////////////////////////////////

  /* Logout Admin */

  public function logout_admin()
  {

    Auth::logout();
    return redirect(url(''));
  }


  ///////////////////////////////////////////////////////

  /* Auth Login */

 public function auth_login(Request $request)
{
    if (Auth::attempt(
        [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 0,
            'is_delete' => 0
        ],
        $request->has('is_remember')
    )) {

        if (Auth::user()->email_verified_at) {
            return response()->json([
                'status' => true,
                'message' => 'Вхід виконано успішно!',
                'redirect' => url('/')
            ]);
        }

        Auth::logout();
        return response()->json([
            'status' => false,
            'message' => 'Ваш акаунт не активований. Перевірте пошту.'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => 'Невірний email або пароль'
    ]);
}
  ///////////////////////////////////////////////////////

  public function auth_register(Request $request)
  {
    try {
      // Валідація вхідних даних
      $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => [
          'required',
          'string',
          'min:6', // Мінімум 6 символів
          'regex:/[a-z]/', // Має містити хоча б одну малу літеру
          'regex:/[A-Z]/', // Має містити хоча б одну велику літеру
          'regex:/[0-9]/', // Має містити хоча б одну цифру
          'regex:/[@$!%*?&]/', // Має містити хоча б один спеціальний символ
        ],
      ]);

      // Якщо валідація пройшла успішно, перевіряємо, чи існує такий email
      $checkEmail = User::checkEmail($request->email);
      if (empty($checkEmail)) {
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        try {
          Mail::to($save->email)
           ->bcc('e-mail@fts.ua')
          ->send(new RegisterMail($save));
        } catch (\Exception $e) {
        }

       $adminUsers = User::where('is_admin', 1)->get();

foreach ($adminUsers as $admin) {
    NotificationModel::insertRecord(
        $admin->id,
        "Новий користувач зареєстрований #" . $request->name,
        url('admin/customer/list')
    );
}

        $json['status'] = true;
        $json['message'] = "Ваш акаунт створено успішно! Лист з активацією вислано на вказану вами електронну адресу.";
      } else {
        $json['status'] = false;
        $json['message'] = "Така ел. адреса вже існує. Будь ласка введіть іншу.";
      }
    } catch (\Illuminate\Validation\ValidationException $e) {
      // Обробка помилок
      $json['status'] = false;
      $json['errors'] = $e->errors(); // Усі помилки
      $json['message'] = "Пароль має містити не менше 6 символів. 
                            Пароль має відповідати наступним критеріям: містити малі та великі літери, цифри і спеціальні символи.
                            Використовуйте онлайн генератор паролів.";
    }

    return response()->json($json); // Повертаємо коректну JSON відповідь
  }


  ///////////////////////////////////////////////////////

  /*  Activate Email */

  public function activate_email($id)
  {
    $id = base64_decode($id);
    $user = User::getSingle($id);
    $user->email_verified_at = date('Y-m-d H:i:s');
    $user->save();
    return redirect(url(''))->with('success', 'Ваш акаунт успішно активований!');
  }

  ///////////////////////////////////////////////////////

  /* Forgot Password */

  public function forgot_password(Request $request)
  {

    $data['meta_title'] = 'Забули пароль?';

    return view('auth.forgot', $data);
  }

  ///////////////////////////////////////////////////////

  /*Auth Forgot Password */

  public function auth_forgot_password(Request $request)
  {
    $user = User::where('email', '=', $request->email)->first();
    if (!empty($user)) {

      $user->remember_token = Str::random(30);
      $user->save();

      try {
        Mail::to($user->email)
          ->bcc('e-mail@fts.ua')
        ->send(new ForgotPasswordMail($user));
      } catch (\Exception $e) {
      }
      return redirect()->back()->with('success', "Перевірте свою електронну пошту та скиньте пароль. ");
    } else {
      return redirect()->back()->with('error', "Електронну адресу не знайдено!");
    }
  }

  ///////////////////////////////////////////////////////

  /*Rese Password */

  public function reset($token)
  {
    $user = User::where('remember_token', '=', $token)->first();

    if (!empty($user)) {
      $data['user'] = $user;
      $data['meta_title'] = "Відновлення паролю";
      return view('auth.reset', $data);
    } else {
      abort(404);
    }
  }
  public function auth_reset($token, Request $request)
  {
    if ($request->password == $request->cpassword) {
      $user = User::where('remember_token', '=', $token)->first();
      $user->password = Hash::make($request->password);
      $user->remember_token = Str::random(30);
      $user->email_verified_at = date('Y-m-d H:i:s');
      $user->save();

      return redirect(url(''))->with('success', "Пароль успішно відновлено");
    } else {
      return redirect()->back()->with('error', "Паролі не співпадають");
    }
  }
}
