@component('mail::message')



Вітаємо, <b><span style="color:#c96">{{ $user->name }}</span></b>,
@php
$getSetting = App\Models\SystemSettingModel::getSingle();
@endphp
<p>Ви майже готові почати користуватися перевагами реєстрованого користувача сайту "{{ $getSetting->website_name }}".</p>
<p>Активуйте свій акаунт натиснувши кнопку нижче.</p>
<p>
    @component('mail::button', ['url' => url('activate/'.base64_encode($user->id))])
    Підтвердити
    @endcomponent
</p>
<p style="color:#c96">З найкращими побажаннями команда сайту "{{ $getSetting->website_name }}".</p>
@endcomponent