@component('mail::message')

Вітаємо, <b><span style="color:#c96">{{ $user->name }}</span></b>,
<p>Ми розуміємо, що це буває. Відновіть свій пароль,  натиснувши кнопку нижче.</p>
<p>
    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
   Відновити пароль
    @endcomponent
</p>
<p>Якщо у вас виникли проблеми з відновленням пароля, будь ласка, зв'яжіться з нами.</p>
@php
$getSetting = App\Models\SystemSettingModel::getSingle();
@endphp
Дякує'мо,
<p style="color:#c96">З найкращими побажаннями команда сайту "{{ $getSetting->website_name }}".</p>
@endcomponent