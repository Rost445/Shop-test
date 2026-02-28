@component('mail::message')
Вітаємо, Адмін!</b>
<p><b>Ім'я:</b> {{ $user->name }} </p>
<p><b>Електронна адреса:</b>  {{ $user->email }} </p>
<p><b>Телефон:</b>  {{ $user->phone }} </p>
<p><b>Тема:</b>  {{ $user->subject }} </p>
<p><b>Повідомлення:</b> {{ $user->message }}  </p>
@endcomponent