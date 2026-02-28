<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        // Перевірка, чи користувач залогінений
        if (!Auth::check()) {
            // Якщо користувач не залогінений, перенаправити на сторінку входу
            return redirect('admin'); // Повертаємо відповідь
        }

        // Якщо користувач залогінений, перевіряємо, чи є він адміністратором
        if (!Auth::user()->is_admin) {
            // Якщо користувач не є адміністратором (is_admin == 0), виходимо із системи та редиректимо
            Auth::logout(); // Вихід з системи
            return redirect('admin'); // Повертаємо редирект на сторінку адміністратора
        }

        // Якщо все ок, передаємо запит наступному Middleware або контролеру
        return $next($request); // Повертаємо результат для наступного Middleware
    }
}
