<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                           <li>
    <a href="tel:{{ $getSystemSettingApp?->phone ?? '' }}">
        <i class="icon-phone"></i>Тел: {{ $getSystemSettingApp?->phone ?? 'Не вказано' }}
    </a>
</li>
                            @if (!empty(Auth::check()))
                                <li><a href="{{ url('my-wishlist') }}"><i class="icon-heart-o"></i>Мій список
                                        бажань</a>
                                @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-heart-o"></i>Мій список
                                        бажань</a></li>
                            @endif
                    </li>
                    <li><a href="{{ url('about') }}">Про нас</a></li>
                    <li><a href="{{ url('contact') }}">Контакти</a></li>
                    @if (!empty(Auth::check()))
                        <li><a href="{{ url('user/dashboard') }}"><i class="icon-user"></i>{{ Auth::user()->name }}</a>
                        </li>
                    @else
                        <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Логін</a></li>
                    @endif

                </ul>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('') }}" class="logo">
                    <img src="{{ $getSystemSettingApp?->getLogo() ?? url('public/default-logo.png') }}" 
     alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="{{ (Request::segment(1) == '') ? 'active' : '' }}">
                            <a href="{{ url('') }}" class="">Головна</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Магазин</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                @php
                                                    $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                                @endphp
                                                @foreach ($getCategoryHeader as $value_h_c)
                                                    @if (!empty($value_h_c->getSubCategory->count()))
                                                        <div class="col-md-4" style="margin-bottom: 20px">
                                                            <a href=" {{ url($value_h_c->slug) }}"
                                                                class="menu-title">{{ $value_h_c->name }}</a>
                                                            <ul>
                                                                @foreach ($value_h_c->getSubCategory as $value_h_sub)
                                                                    <li><a
                                                                            href="{{ url($value_h_c->slug . '/' . $value_h_sub->slug) }}">{{ $value_h_sub->name }}</a>
                                                                    </li>
                                                                @endforeach
                        </li>
                    </ul>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>
    </li>
    @php
        $getCategoryHeaderMenu = App\Models\CategoryModel::getRecordMenuHeader();
    @endphp
    @foreach ($getCategoryHeaderMenu as $menu)
    <li class="{{ (Request::segment(1) == $menu->slug) ? 'active' : '' }}">
        <a href="{{ url($menu->slug) }}" >{{ $menu->name }}</a>
    </li>
    @endforeach
    </ul>
    </nav>
    </div>
    <div class="header-right">
        <div class="header-search">
            <a href="{{ url('search') }}" class="search-toggle" role="button" title="Пошук"><i
                    class="icon-search"></i></a>
            <form action="{{ url('search') }}" method="get">
                <div class="header-search-wrapper">
                    <label for="q" class="sr-only">Пошук</label>
                    <input type="search" value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}"
                        class="form-control" name="q" id="q" placeholder="Search in..." required>
                </div>
            </form>
        </div>
        <div class="dropdown cart-dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" data-display="static">
                <i class="icon-shopping-cart"></i>
                <span class="cart-count">{{ Cart::getContent()->count() }}</span>
            </a>
            @if (!empty(Cart::getContent()->count()))
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-cart-products">

                        @foreach (Cart::getContent() as $header_cart)
                            @php
                                $getCartProduct = App\Models\ProductModel::getSingle($header_cart->id);
                            @endphp

                            @if (!empty($getCartProduct))
                                @php
                                    $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                @endphp
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{ url($getCartProduct->slug) }}">
                                                {{ $getCartProduct->title }}
                                            </a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{ $header_cart->quantity }}</span> x
                                            {{ number_format($header_cart->price, 2) }} грн
                                        </span>
                                    </div>
                                    <figure class="product-image-container">
                                        <a href="{{ url($getCartProduct->slug) }}" class="product-image">
                                            <img src="{{ $getProductImage->getLogo() }}" alt="product">
                                        </a>
                                    </figure>

                                    <a href="{{ url('cart/delete/' . $header_cart->id) }}" class="btn-remove"
                                        title="Remove Product"><i class="icon-close"></i></a>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="dropdown-cart-total">
                        <span>Всього</span>

                        <span class="cart-total-price">{{ number_format(Cart::getSubTotal(), 2) }} грн</span>
                    </div>

                    <div class="dropdown-cart-action">
                        <a href="{{ url('cart') }}" class="btn btn-primary">До кошика</a>
                        <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2"><span>
                                Оплатити</span><i class="icon-long-arrow-right"></i></a>
                    </div>
                </div>
            @endif

        </div>
    </div>
    </div>
    </div>
</header>
