<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{ $getSystemSettingApp->getLogo() }}" class="footer-logo" alt="Footer Logo"
                            width="105" height="25">
                        <p>{{ $getSystemSettingApp->footer_description }} </p>

                        <div class="social-icons">
                            @if (!empty($getSystemSettingApp->facebook_link))
                                <a href="{{ $getSystemSettingApp->facebook_link }}" class="social-icon" title="Facebook"
                                    target="_blank"><i class="icon-facebook-f"></i></a>
                            @endif
                            @if (!empty($getSystemSettingApp->instagram_link))
                                <a href="{{ $getSystemSettingApp->instagram_link }}" class="social-icon"
                                    title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            @endif
                            @if (!empty($getSystemSettingApp->youtube_link))
                                <a href="{{ $getSystemSettingApp->youtube_link }}" class="social-icon" title="Youtube"
                                    target="_blank"><i class="icon-youtube"></i></a>
                            @endif
                            @if (!empty($getSystemSettingApp->tiktok_link))
                                <a href="{{ $getSystemSettingApp->tiktok_link }}" class="social-icon" title="Tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Корисні посилання</h4>

                        <ul class="widget-list">
                            <li><a href="{{ url('/') }}">Головна</a></li>
                            <li><a href="{{ url('about') }}">Про нас</a></li>
                            <li><a href="{{ url('contact') }}">Контакти</a></li>
                            <li><a href="{{ url('faq') }}">FAQ</a></li>
                            <li><a href="{{ url('blog') }}">Блог</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Обслуговування клієнтів</h4>

                        <ul class="widget-list">
                            <li><a href="{{ url('payment-method') }}">Способи оплати</a></li>
                            <li><a href="{{ url('money-back') }}">Повернення коштів</a></li>
                            <li><a href="{{ url('return-policy') }}">Повернення товару</a></li>
                            <li><a href="{{ url('shipping-method') }}">Способи Доставки</a></li>
                            <li><a href="{{ url('terms-and-condition') }}">Правила та умови</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Політика конфіденційності</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Мій акаунт</h4>
                        <ul class="widget-list">
                            @if (!empty(Auth::check()))
                                <li><a href="{{ url('user/dashboard') }}"><i
                                            class="icon-user"></i>{{ Auth::user()->name }}</a>
                                </li>
                            @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Логін</a></li>
                            @endif
                            <li><a href="{{ url('cart') }}"> Переглянути кошик</a></li>
                            <li><a href="{{ url('checkout') }}"> Оплата</a></li>
                            <li>
                                @if (!empty(Auth::check()))
                            <li><a href="{{ url('my-wishlist') }}">Мій список
                                    бажань</a>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Мій список
                                    бажань</a></li>
                            @endif
                            </li>
                            <li>
                                @if (!empty(Auth::check()))
                                    <a href="{{ url('user/orders') }}">Відстежити моє замовлення</a>
                            </li>
                        @else
                            <a href="#signin-modal" data-toggle="modal">Відстежити моє замовлення</a>
                            @endif
                            </li>
                            @if  (!empty(Auth::check()))
                                <li><a href="{{ url('user/dashboard') }}">Мій профіль</a></li>
                                <li><a href="{{ url('admin/logout') }}">Вийти</a></li>
                            @endif
                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Авторське право © {{ date('Y')}} {{ $getSystemSettingApp->website_name }}. Всі права захищено.</p>

            <figure class="footer-payments">
                <img src="{{ $getSystemSettingApp->getFooterPayment() }}" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>
